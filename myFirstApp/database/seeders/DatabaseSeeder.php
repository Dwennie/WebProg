<?php

namespace Database\Seeders;

use App\Models\BloodDonor;
use App\Models\BloodRequest;
use App\Models\ContactInfo;
use App\Models\ContactQuery;
use App\Models\Page;
use App\Models\Requirer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Default Administrator with Hashed Password
        User::updateOrCreate(
            ['email' => 'admin@bloodcare.org'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('admin123'), // Securely hashed with bcrypt
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Initial Blood Donors
        $donors = [
            [
                'name' => 'Marco Alcantara',
                'blood_group' => 'O+',
                'gender' => 'Male',
                'age' => 26,
                'weight' => 68,
                'phone' => '+63 917 123 4567',
                'email' => 'marco@example.com',
                'city' => 'Tagbilaran City',
                'province' => 'Bohol',
                'address' => 'Barangay Cogon',
                'last_donated' => now()->subMonths(3),
                'status' => 'available',
            ],
            [
                'name' => 'Jessica Tan',
                'blood_group' => 'A+',
                'gender' => 'Female',
                'age' => 23,
                'weight' => 54,
                'phone' => '+63 928 345 6789',
                'email' => 'jessica@example.com',
                'city' => 'Dauis',
                'province' => 'Bohol',
                'address' => 'Poblacion',
                'last_donated' => null,
                'status' => 'available',
            ],
            [
                'name' => 'Bea Mendoza',
                'blood_group' => 'O-',
                'gender' => 'Female',
                'age' => 28,
                'weight' => 58,
                'phone' => '+63 945 567 8901',
                'email' => 'bea@example.com',
                'city' => 'Panglao',
                'province' => 'Bohol',
                'address' => 'Tawala',
                'last_donated' => now()->subMonths(5),
                'status' => 'available',
            ],
            [
                'name' => 'Ronald Gomez',
                'blood_group' => 'B+',
                'gender' => 'Male',
                'age' => 31,
                'weight' => 74,
                'phone' => '+63 939 456 7890',
                'email' => 'ronald@example.com',
                'city' => 'Tubigon',
                'province' => 'Bohol',
                'address' => 'Centro',
                'last_donated' => now()->subMonth(),
                'status' => 'unavailable',
            ],
        ];

        foreach ($donors as $donor) {
            BloodDonor::updateOrCreate(['email' => $donor['email']], $donor);
        }

        // 3. Seed Initial Blood Requests
        $requests = [
            [
                'patient_name' => 'Maria Santos',
                'blood_group' => 'O+',
                'units' => 3,
                'urgency' => 'immediate',
                'reason' => 'Emergency Cesarean Surgery',
                'hospital_name' => "Cebu Doctors' University Hospital",
                'ward' => 'ICU Room 204',
                'city' => 'Cebu City',
                'doctor' => 'Dr. Alvarez',
                'contact_name' => 'Eduardo Santos',
                'relationship' => 'Spouse',
                'contact_phone' => '+63 917 111 2233',
                'contact_email' => 'eduardo@example.com',
                'status' => 'pending',
            ],
            [
                'patient_name' => 'Roberto Cruz',
                'blood_group' => 'B-',
                'units' => 2,
                'urgency' => '24h',
                'reason' => 'Trauma / Motorcycle Accident Care',
                'hospital_name' => 'Gov. Celestino Gallares Memorial Medical Center',
                'ward' => 'Surgical Ward Bed 6',
                'city' => 'Tagbilaran City',
                'doctor' => 'Dr. Lim',
                'contact_name' => 'Nora Cruz',
                'relationship' => 'Mother',
                'contact_phone' => '+63 922 444 5566',
                'contact_email' => 'nora@example.com',
                'status' => 'pending',
            ],
            [
                'patient_name' => 'David Kim',
                'blood_group' => 'AB+',
                'units' => 1,
                'urgency' => 'scheduled',
                'reason' => 'Cardiac Procedure',
                'hospital_name' => 'Holy Name University Medical Center',
                'ward' => 'Private Room 410',
                'city' => 'Tagbilaran City',
                'doctor' => 'Dr. Tan',
                'contact_name' => 'Grace Kim',
                'relationship' => 'Daughter',
                'contact_phone' => '+63 933 777 8899',
                'contact_email' => 'grace@example.com',
                'status' => 'fulfilled',
            ],
        ];

        foreach ($requests as $req) {
            BloodRequest::updateOrCreate(
                ['patient_name' => $req['patient_name'], 'hospital_name' => $req['hospital_name']],
                $req
            );
        }

        // 4. Seed Contact Information / Blood Bank Centers
        $centers = [
            [
                'center_name' => 'BloodCare Central Blood Bank',
                'facility_type' => 'central_blood_bank',
                'coordinator' => 'Dr. Ramon Santos, MD',
                'address' => 'Gov. Celestino Gallares St.',
                'city' => 'Tagbilaran City',
                'province' => 'Bohol',
                'emergency_hotline' => '+63 (38) 411-2000',
                'phone' => '+63 (38) 411-2001',
                'email' => 'central@bloodcare.org',
                'operating_hours' => '24/7 (Emergency Dispatch)',
            ],
            [
                'center_name' => 'North Bohol Regional Blood Station',
                'facility_type' => 'regional_depot',
                'coordinator' => 'Elena Gutierrez, RN',
                'address' => 'Poblacion Centro',
                'city' => 'Tubigon',
                'province' => 'Bohol',
                'emergency_hotline' => '+63 (38) 508-3112',
                'phone' => '+63 (38) 508-3113',
                'email' => 'northstation@bloodcare.org',
                'operating_hours' => 'Mon - Sat: 8:00 AM - 6:00 PM',
            ],
        ];

        foreach ($centers as $center) {
            ContactInfo::updateOrCreate(['center_name' => $center['center_name']], $center);
        }

        // 5. Seed Contact Queries
        $queries = [
            [
                'name' => 'Patricia Lim',
                'email' => 'patricia@example.com',
                'phone' => '+63 915 222 3344',
                'subject' => 'Donor Eligibility Criteria',
                'message' => 'Can I donate blood if I completed a course of antibiotics last week?',
                'status' => 'new',
            ],
            [
                'name' => 'Gabriel Ocampo',
                'email' => 'gabriel.o@hospital.org',
                'phone' => '+63 918 333 4455',
                'subject' => 'Bulk Blood Supply Partnership',
                'message' => 'We would like to establish a recurring monthly mobile blood drive schedule for our clinic.',
                'status' => 'in_review',
            ],
        ];

        foreach ($queries as $q) {
            ContactQuery::updateOrCreate(['email' => $q['email'], 'subject' => $q['subject']], $q);
        }

        // 6. Seed Requirers
        $requirers = [
            [
                'org_name' => 'Gov. Celestino Gallares Memorial Medical Center',
                'category' => 'hospital',
                'license_no' => 'DOH-LIC-07-2024-001',
                'contact_person' => 'Dr. Maria Corazon',
                'designation' => 'Chief of Clinics',
                'phone' => '+63 (38) 411-4831',
                'email' => 'gallares.med@doh.gov.ph',
                'city' => 'Tagbilaran City',
                'province' => 'Bohol',
                'address' => 'M. Parras St.',
                'total_requests' => 42,
                'status' => 'verified',
            ],
            [
                'org_name' => 'Holy Name University Medical Center',
                'category' => 'hospital',
                'license_no' => 'DOH-LIC-07-2023-089',
                'contact_person' => 'Nurse Supervisor Ramos',
                'designation' => 'Blood Bank Liaison',
                'phone' => '+63 (38) 501-9946',
                'email' => 'hnumc.blood@hnu.edu.ph',
                'city' => 'Tagbilaran City',
                'province' => 'Bohol',
                'address' => 'Dampas District',
                'total_requests' => 19,
                'status' => 'verified',
            ],
        ];

        foreach ($requirers as $r) {
            Requirer::updateOrCreate(['org_name' => $r['org_name']], $r);
        }

        // 7. Seed Pages
        $pages = [
            [
                'title' => 'About Blood Donation & Its Importance',
                'slug' => 'about-blood-donation',
                'category' => 'awareness',
                'summary' => 'Understanding how voluntary blood donations sustain community life and support critical healthcare operations.',
                'body' => 'Blood is the most precious gift that anyone can give to another person — the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components — red cells, platelets and plasma.',
                'status' => 'published',
                'order' => 1,
            ],
            [
                'title' => 'Donor Eligibility & Health Guidelines',
                'slug' => 'donor-eligibility',
                'category' => 'guidelines',
                'summary' => 'Key medical prerequisites, age requirements, and screening questions for prospective donors.',
                'body' => 'Eligible donors must be between 18 and 65 years old, weigh at least 50 kg (110 lbs), have a pulse rate between 60-100 bpm, and have normal blood pressure and hemoglobin levels.',
                'status' => 'published',
                'order' => 2,
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
