<x-layout>
    <div class="relative overflow-x-auto sm:rounded-lg">
        <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto">
            <img class="w-full" src="https://v1.tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4 text-xl">
                <div class="mb-2">姓名: <b>{{ session('a_Name'); }}</b></div>
                <div class="mb-2">編號: {{ session('a_Id'); }}</div>
                <div class="mb-2">生日: 2002/02/12</div>
                <div>電話: 2002/02/12</div>
            </div>
            <hr >
            <div class="px-6 pt-4 pb-2">
                標籤機連結:
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#A</span>
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#B</span>
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#C</span>
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#D</span>
            </div>
        </hr>
    </div>
</x-layout>
