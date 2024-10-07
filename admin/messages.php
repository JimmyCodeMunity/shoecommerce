<div class="w-full flex-row flex items-start justify-between bg-purple-100">
    <div class="w-[20%]">
        <?php
        @include('sidebar.php')
        ?>
    </div>
    <div class="w-[80%]">
        <?php
        @include('navbar.php');
        ?>



<!-- table here -->
 <div class="w-full justify-end items-end flex flex-row sm:px-16 px-6">
    <!-- <div class="bg-purple-400 h-12 rounded-lg flex px-2 justify-center items-center">
        <a href="" class="text-white font-semibold">Add Product</a>
    </div> -->
 </div>

<div class="w-full sm:px-16 px-6 py-4">
<div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 bg-white">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Message</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Sender</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Time</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd:bg-white even:bg-gray-100">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Iphone 12</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">45000</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                <img src="" class="h-10 w-10 rounded-full border border-slate-400 border-1" alt="">
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none ">Delete</button>
              </td>
            </tr>

            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

 
    </div>
</div>