# Laravel Web Application & Student Management System

A full-stack Laravel application containerized with Docker, featuring Student Management (CRUD), Blood Bank / Donor Management, Admin Authentication, and a personal Portfolio system.

---

## 🛠 Tech Stack

- **Backend:** Laravel 11 (PHP 8.2+)
- **Database:** MySQL 8.4
- **Web Server:** Nginx (Alpine)
- **Database GUI:** phpMyAdmin
- **Frontend:** Blade, React (Inertia.js), Tailwind CSS, Vite
- **DevOps / Environment:** Docker & Docker Compose

---

## 🚀 Getting Started

### Prerequisites

Make sure you have installed on your local machine:
- [Git](https://git-scm.com/)
- [Docker](https://www.docker.com/products/docker-desktop/) & [Docker Compose](https://docs.docker.com/compose/)

---

### Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone <your-repository-url>
   cd cabanelez1-tth1
   ```

2. **Set up the environment configuration:**
   ```bash
   cp myFirstApp/.env.example myFirstApp/.env
   ```

3. **Start Docker containers:**
   ```bash
   docker compose up -d --build
   ```

4. **Install PHP dependencies:**
   ```bash
   docker compose exec php composer install
   ```

5. **Generate the application encryption key:**
   ```bash
   docker compose exec php php artisan key:generate
   ```

6. **Run database migrations:**
   ```bash
   docker compose exec php php artisan migrate
   ```

7. **(Optional) Seed initial data if applicable:**
   ```bash
   docker compose exec php php artisan db:seed
   ```

---

## 🌐 Services & Ports

Once the Docker containers are running:

| Service | URL / Port | Credentials (Default) |
| :--- | :--- | :--- |
| **Web Application** | [http://localhost:8000](http://localhost:8000) | — |
| **phpMyAdmin** | [http://localhost:8080](http://localhost:8080) | User: `root` \| Password: `secret` |
| **MySQL Database** | `localhost:3306` | DB: `myFirstApp` \| User: `laravel` \| Password: `secret` |
| **Vite Dev Server** | [http://localhost:5173](http://localhost:5173) | — |

---

## 📂 Project Structure

```text
├── docker/                     # Docker configuration (Nginx, PHP, Node)
├── docker-compose.yml          # Container service definitions
├── README.md                   # Project documentation
├── .gitignore                  # Git ignore rules
└── myFirstApp/                 # Laravel application directory
    ├── app/
    │   ├── Http/Controllers/  # Controllers (Student2Controller, AdminController, etc.)
    │   └── Models/             # Eloquent Models (Student, User, etc.)
    ├── database/
    │   └── migrations/         # Database migrations
    ├── resources/
    │   └── views/
    │       └── students/       # Student management Blade views
    ├── routes/
    │   └── web.php             # Web route definitions
    └── STUDENT_MANAGEMENT.md   # Detailed architecture & workflow documentation
```

---

## 🎓 Student Management Module

The **Student Management System** provides full CRUD operations:
- **Listing:** `GET /students`
- **Creation:** `GET /students/create` & `POST /students`
- **Editing:** `GET /students/{id}/edit` & `PUT /students/{id}`
- **Deletion:** `GET /students/{id}/delete` & `DELETE /students/{id}`

For complete architectural details, MVC flow diagrams, and route-to-controller mapping, read [myFirstApp/STUDENT_MANAGEMENT.md](myFirstApp/STUDENT_MANAGEMENT.md).

---

## 🔧 Useful Commands

### Laravel Artisan (via Docker)
```bash
# Check registered routes
docker compose exec php php artisan route:list

# Run migrations
docker compose exec php php artisan migrate

# Clear caches
docker compose exec php php artisan optimize:clear
```

### Docker Management
```bash
# Stop all containers
docker compose down

# View logs
docker compose logs -f

# Access PHP container shell
docker compose exec php bash
```
