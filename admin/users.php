<?php
@include('includes/connection.php');

$select = "SELECT * FROM users";
$result = mysqli_query($conn, $select);
?>
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
      <div class="bg-purple-400 h-12 rounded-lg flex px-2 justify-center items-center">
        <a href="adduser.php" class="text-white font-semibold">Add User</a>
      </div>
    </div>

    <div class="w-full sm:px-16 px-6 py-4">
      <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200 bg-white">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Name</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Email</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">phone</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Address</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Verified</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if (mysqli_num_rows(($result)) < 0) {
                  ?>
                    <p class="text-yellow-600 bg-slate-300 rounded-md text-center ">No users Available</p>
                  <?php } else { ?>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>

                      <tr class="odd:bg-white even:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?php echo $row['username'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo $row['email'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo $row['phone'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo $row['address'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php
                                                                                      if ($row['verified'] == 1) { ?>
                            <i class='fa fa-check text-green-500'></i>

                          <?php } else { ?>
                            <button href="" onclick="openModal(<?php echo $row['id'] ?>)" data-modal-target="popup-modal1" data-modal-toggle="popup-modal1" class="" type="button">
                              <p class="text-red-500">Verify</p>
                            </button>
                          <?php } ?>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                          <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none ">Delete</button>
                        </td>
                      </tr>
                    <?php } ?>


                  <?php } ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="popup-modal1" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal1">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="p-4 md:p-5 text-center">
            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to approve this account?</h3>
            <button id="confirm-approval" data-modal-hide="popup-modal1" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
              Yes, I'm sure
            </button>
            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>


<script>
// Store the product ID to delete
let usertoapprove = null;

function openModal(id) {
  usertoapprove = id;
  alert("Id not found",id)
  document.getElementById('popup-modal1').classList.remove('hidden');
}

function closeModal() {
  document.getElementById('popup-modal1').classList.add('hidden');
}

// Handle confirmation
document.getElementById('confirm-approval').addEventListener('click', function() {
  if (usertoapprove) {
    alert("Id  found")
    window.location.href = "?id=" + usertoapprove + "&action=approve";
  }
  else{
    alert("Id not found")
  }
});
</script>