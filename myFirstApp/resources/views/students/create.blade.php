<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Student Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button, .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        button {
            background: #198754;
            color: white;
        }

        .back-button {
            background: #6c757d;
            color: white;
        }

        .error {
            color: #b02a37;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Add Student Details</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <label for="name">Name:</label>
    <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name') }}"
        required
    >

    <label for="course">Course:</label>
    <input
        type="text"
        name="course"
        id="course"
        value="{{ old('course') }}"
        required
    >

    <label for="age">Age:</label>
    <input
        type="number"
        name="age"
        id="age"
        value="{{ old('age') }}"
        min="1"
        required
    >

    <button type="submit">Save Student</button>

    <a href="{{ route('students.index') }}" class="back-button">
        Cancel
    </a>
</form>


</div>

</body>
</html>