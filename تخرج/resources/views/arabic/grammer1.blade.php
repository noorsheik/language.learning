<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body >

    @if (session('message321'))
        <div class="flex justify-center">
            <div class="alert alert-info bg-blue-100 border border-blue-500 text-blue-800 p-4 rounded-lg shadow-md w-1/2 text-center">
                {{ session('message321') }}
            </div>
        </div>
    @endif

<div class="flex space-x-5 text-center flex items-center justify-center min-h-screen bg-red-600 ">
        <!-- First Table -->
        <table class="border border-gray-400 bg-white shadow-md w-full m-5 border-blue-500 border-8">
            <tbody>
                <tr class="border-b border-gray-300 ">
                    <td class="p-4 text-center">1-أداة التعريف
(The definite article)</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center">2- اسم مؤنث (مثال: مدرسة)
(Feminine noun example)</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center">3-  الفعل الماضي: "هو كتب"
(Past tense: 'he wrote')</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center">4-ضمير المخاطب المذكر المفرد
(You, masc. singular pronoun)</td>
                </tr>
            </tbody>
        </table>

        <!-- Second Table -->
        <table class="border border-gray-400 bg-white shadow-md w-full mr-5  border-blue-500 border-8">
        <form action="/Amain/Grammer1" method="POST" >
            @csrf
            <tbody >
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center hover:bg-gray-200">
                        <select name="option1" id="">
                            <option value="1">🔹 الـ (al-)</option>
                            <option value="2">🔸 بِ (bi-)</option>
                            <option value="3">🔹 لِ (li-)</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center hover:bg-gray-200">
                        <select name="option2" id="">
                            <option value="1">📖 كتاب (book)</option>
                            <option value="2">✒️ قلم (pen)</option>
                            <option value="3">🪑 كرسي (chair)</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center hover:bg-gray-200">
                        <select name="option3" id="">
                            <option value="1"> ✍️ كتب (kataba)
                            </option>
                            <option value="2">📜 كتابة (writing)
                            </option>
                            <option value="3">
                            🧑‍🏫 كاتب (writer)
                            </option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-4 text-center hover:bg-gray-200">
                        <select name="option4" id="">
                            <option value="1">
                            👤 أنتَ (anta - you, masc.)
                            </option>
                                                        <option value="2">
                            🙋 أنا (ana - I)
                            </option>
                                                        <option value="3">
                            👩 هي (hiya - she)
                            </option>
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
</html>