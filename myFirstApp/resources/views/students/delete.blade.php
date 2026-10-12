<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Delete Student</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px 20px;
            color: #333;
        }

        .container {
            max-width: 550px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #dc3545;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .warning {
            background-color: #f8d7da;
            color: #842029;
            padding: 15px;
            border: 1px solid #f5c2c7;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 25px;
        }

        .details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 25px;
        }

        .details p {
            margin: 12px 0;
            overflow-wrap: anywhere;
        }

        .details strong {
            display: inline-block;
            min-width: 100px;
            color: #495057;
        }

        .buttons {
            display: flex;
            gap: 12px;
        }

        button,
        .cancel-button {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
        }

        .delete-button:hover {
            background-color: #bb2d3b;
        }

        .cancel-button {
            background-color: #6c757d;
            color: white;
        }

        .cancel-button:hover {
            background-color: #5c636a;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
                margin: 20px auto;
            }

            .buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <div class="container">

        <h1>Delete Student</h1>

        <div class="warning">
            <strong>Warning!</strong>
            Are you sure you want to delete this student?
            This action cannot be undone.
        </div>

        <div class="details">
            <p>
                <strong>ID:</strong>
                {{ $student->id }}
            </p>

            <p>
                <strong>Name:</strong>
                {{ $student->name }}
            </p>

            <p>
                <strong>Course:</strong>
                {{ $student->course }}
            </p>

            <p>
                <strong>Age:</strong>
                {{ $student->age }}
            </p>
        </div>

        <form
            action="{{ route('students.destroy', $student->id) }}"
            method="POST"
            onsubmit="return confirm('Are you sure you want to permanently delete this student?');"
        >
            @csrf
            @method('DELETE')

            <div class="buttons">
                <button type="submit" class="delete-button">
                    Yes, Delete
                </button>

                <a href="{{ route('students.index') }}"
                   class="cancel-button">
                    Cancel
                </a>
            </div>
        </form>

    </div>

</body>
</html>