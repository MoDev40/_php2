<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 p-8">
    <div class="flex flex-col space-y-3">
        <button id="showModal" class="w-40 p-2 text-white rounded-md bg-green-500">Add New Student</button>
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                    <th class="py-3 px-4 text-left">Student ID</th>
                    <th class="py-3 px-4 text-left">Name</th>
                    <th class="py-3 px-4 text-left">Class</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div id="formModal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <div class="p-5 border-b">
                <h2 class="text-lg font-semibold">Student Form</h2>
            </div>
            <form class="p-8">
                    <div class="mb-4">
                        <label for="student-id" class="block text-sm font-medium text-gray-700">Student ID</label>
                        <input type="text" id="student-id" name="student_id" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
    
                    <div class="mb-4">
                        <label for="student-name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="student-name" name="student_name"  class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
    
                    <div class="mb-4">
                        <label for="student-class" class="block text-sm font-medium text-gray-700">Class</label>
                        <input type="text" id="student-class" name="student_class"  class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                    <div class="p-5 space-x-3 flex justify-end">
                        <button type="button" id="closeModal" class="px-4 py-2 bg-red-500 text-white rounded">Close</button>
                        <button type="button" id="saveData" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
                    </div>
            </form>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>