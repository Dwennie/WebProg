<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Details Records</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            color: #222;
        }

        h2 {
            margin-top: 30px;
            margin-bottom: 20px;
            color: #444;
        }

        .add-button {
            display: inline-block;
            padding: 11px 18px;
            background-color: #198754;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .add-button:hover {
            background-color: #146c43;
        }

        .success {
            margin-top: 20px;
            padding: 12px 15px;
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
            border-radius: 5px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: white;
        }

        thead {
            background-color: #212529;
            color: white;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        .action-link {
            display: inline-block;
            padding: 7px 11px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
        }

        .edit-button {
            background-color: #0d6efd;
        }

        .edit-button:hover {
            background-color: #0b5ed7;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .delete-button:hover {
            background-color: #bb2d3b;
        }

        .empty-message {
            text-align: center;
            padding: 25px;
            color: #777;
        }

        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            .container {
                padding: 18px;
            }

            th, td {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Student Management</h1>

    <a href="{{ route('students.create') }}" class="add-button">
        + Add Student
    </a>

    <h2>Student Details Records</h2>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($students as $student)
                    <tr>
                          <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->age }}</td>
                    <td>
                            <a
                                href="{{ route('students.edit', $student->id) }}"
                                class="action-link edit-button"
                            >
                                Edit
                            </a>

                            <a
                                href="{{ route('students.delete', $student->id) }}"
                                class="action-link delete-button"
                            >
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-message">
                            No student details found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

</body>
</html>