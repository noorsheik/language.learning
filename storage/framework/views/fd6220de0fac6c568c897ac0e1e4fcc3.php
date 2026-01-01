<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body >

    <?php if(session('message321')): ?>
        <div class="flex justify-center">
            <div class="alert alert-info bg-blue-100 border border-blue-500 text-blue-800 p-4 rounded-lg shadow-md w-1/2 text-center">
                <?php echo e(session('message321')); ?>

            </div>
        </div>
    <?php endif; ?>

<div class="flex space-x-5 text-center flex items-center justify-center min-h-screen bg-red-600 ">
        <!-- First Table -->
        <table class="border border-gray-400 bg-white shadow-md w-full m-5 border-blue-500 border-8">
            <tbody>
                <tr class="border-b border-gray-300 ">
                    <td class="p-4 text-center">1- Be</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center">2- break</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center">3- take</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center">4- begin</td>
                </tr>
            </tbody>
        </table>

        <!-- Second Table -->
        <table class="border border-gray-400 bg-white shadow-md w-full mr-5  border-blue-500 border-8">
        <form action="/main/past irregular verbs" method="POST" >
            <?php echo csrf_field(); ?>
            <tbody >
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center hover:bg-gray-200">
                        <select name="option1" id="">
                            <option value="1">ate</option>
                            <option value="2">was/were</option>
                            <option value="3">been</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center hover:bg-gray-200">
                        <select name="option2" id="">
                            <option value="1">broken</option>
                            <option value="2">broke</option>
                            <option value="3">meet</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center hover:bg-gray-200">
                        <select name="option3" id="">
                            <option value="1">broken</option>
                            <option value="2">taken</option>
                            <option value="3">took</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center hover:bg-gray-200">
                        <select name="option4" id="">
                            <option value="1">did</option>
                            <option value="2">begun</option>
                            <option value="3">began</option>
                        </select>
                    </td>
                </tr>
                <!-- Submit Button -->
                <tr>
                    <td class="p-4 text-center">
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Submit</button>
                    </td>
                </tr>
            </tbody>
        </form>

        </table>

       
    </div>
    </div>
 
    
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html><?php /**PATH C:\Users\User\Herd\game\resources\views/english/irregular.blade.php ENDPATH**/ ?>