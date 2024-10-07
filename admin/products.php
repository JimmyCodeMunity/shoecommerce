<?php
@include('includes/connection.php');

$select = "SELECT * FROM products";
$result = mysqli_query($conn, $select);

$id = $_GET['id'];
$action = $_GET['action'];
if ($id) {
  echo $id;
  echo $action;
}


if ($action == 'delete' && $id) {
  $delete = "DELETE FROM products WHERE id = '$id'";
  mysqli_query($conn, $delete);
  header("location: products.php");
}
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
        <a href="addproduct.php" class="text-white font-semibold">Add Product</a>
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
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Price</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Size</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Color</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500">Image</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <tr class="odd:bg-white even:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?php echo $row['name'] ?></td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo $row['price'] ?></td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo $row['size'] ?></td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo $row['color'] ?></td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        <img src="images/<?php echo $row['image'] ?>" class="h-10 w-10 rounded-full border border-slate-400 border-1" alt="">
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium space-x-3">
                        <a href="editproduct.php?id=<?php echo $row['id'] ?>" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none ">
                        <i style="font-size:20px;color:green;" class="fa fa-edit"></i>
                        </a>
                        <!-- <a href="?id=<?php echo $row['id'] ?>&&action=delete" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none ">Delete</a> -->
                        <button href="" onclick="openModal(<?php echo $row['id'] ?>)" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="" type="button">
                          <i style="font-size:20px;color:red;" class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  <?php } ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="p-4 md:p-5 text-center">
            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
            <button id="confirm-delete" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
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
let productIdToDelete = null;

function openModal(id) {
  productIdToDelete = id;
  document.getElementById('popup-modal').classList.remove('hidden');
}

function closeModal() {
  document.getElementById('popup-modal').classList.add('hidden');
}

// Handle confirmation
document.getElementById('confirm-delete').addEventListener('click', function() {
  if (productIdToDelete) {
    window.location.href = "products.php?id=" + productIdToDelete + "&action=delete";
  }
});
</script>