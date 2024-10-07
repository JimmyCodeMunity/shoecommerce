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
            

            <div class="w-full flex flex-col">
                <form action="">
                    <div class="w-full space-y-4">
                        <h1 class="font-semibold text-xl">Add New User</h1>
                    <div class="w-full flex flex-col justify-between items-center space-x-3">
                        <div class="w-full space-y-2">
                            <label for="" class="text-slate-400">Fullname</label>
                            <input placeholder="enter fullname" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                        </div>
                        <div class="w-full space-y-2">
                            <label for="" class="text-slate-400">Phone</label>
                            <input placeholder="enter phone number" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                        </div>
                        <div class="w-full space-y-2">
                            <label for="" class="text-slate-400">Address</label>
                            <input placeholder="enter address" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                        </div>
                        
                        <div class="w-full space-y-2">
                            <label for="" class="text-slate-400">Image</label>
                            <!-- textarea-->
                             <input placeholder="enter " type="file" class="bg-slate-200 rounded-md py-2 h-12 w-full">
                        </div>
                        
                    </div>
                    
                    <button class="w-60 h-12 rounded-lg bg-purple-400 text-white">Add user</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>