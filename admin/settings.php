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

        <div class="w-full sm:px-16 px-6">
            <img src="assets/banner1.jpg" class="w-full h-60 object-fit overflow-hidden rounded-md" alt="">

            <div class="w-full flex flex-col justify-center items-center py-6 space-y-3">
                <img src="" class="border border-1 border-purple-500 rounded-full h-32 w-32" alt="">
                <h2 class="font-semibold text-slate-600 text-xl">Jimmy</h2>
                <p class="text-lg text-slate-500">jimmy@gmail.com</p>
            </div>

            <div class="w-full flex flex-col">
                <form action="">
                    <div class="w-full space-y-4">
                    <div class="w-full flex flex-row justify-between items-center space-x-3">
                        <div class="w-full space-y-2">
                            <label for="" class="text-slate-400">Username</label>
                            <input type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                        </div>
                        <div class="w-full space-y-2">
                            <label for="" class="text-slate-400">Email</label>
                            <input type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                        </div>
                        
                    </div>
                    <div class="w-full flex flex-row justify-between items-center space-x-3">
                        <div class="w-full space-y-2">
                            <label for="" class="text-slate-400">Phone</label>
                            <input type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                        </div>
                        <div class="w-full space-y-2">
                            <label for="" class="text-slate-400">Address</label>
                            <input type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                        </div>
                        
                    </div>
                    <button class="w-full h-12 rounded-lg bg-purple-400 text-white">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>