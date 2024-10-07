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

        <div class="px-5">
            <div class="py-6 px-4 w-full rounded-xl justify-between flex flex-row bg-white items-center">
                <div class="w-40 bg-white rounded-xl flex flex-row space-x-3 items-start justify-between">
                    <div class="h-8 w-8 rounded-full bg-orange-400 justify-center items-center flex">
                        <div><i class="fa fa-dollar"></i></div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-slate-500 tracking-wide">Total Revenue</p>
                        <h1 class="font-bold text-3xl">$234</h1>
                    </div>
                </div>
                <div class="w-40 bg-white rounded-xl flex flex-row space-x-3 items-start justify-between">
                    <div class="h-8 w-8 rounded-full bg-green-400 justify-center items-center flex">
                        <div><i class="fa fa-plus"></i></div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-slate-500 tracking-wide">Profit</p>
                        <h1 class="font-bold text-3xl">$234</h1>
                    </div>
                </div>
                <div class="w-40 bg-white rounded-xl flex flex-row space-x-3 items-start justify-between">
                    <div class="h-8 w-8 rounded-full bg-blue-400 justify-center items-center flex">
                        <div><i class="fa fa-gift"></i></div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-slate-500 tracking-wide">Total Products</p>
                        <h1 class="font-bold text-3xl">1000</h1>
                    </div>
                </div>
                <div class="w-40 bg-white rounded-xl flex flex-row space-x-3 items-start justify-between">
                    <div class="h-8 w-8 rounded-full bg-purple-400 justify-center items-center flex">
                        <div><i class="fa fa-users"></i></div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-slate-500 tracking-wide">Clients</p>
                        <h1 class="font-bold text-3xl">3445</h1>
                    </div>
                </div>
            </div>





            <!-- graph -->

            <div class="w-full justify-between items-center flex flex-row py-6 space-x-4">
                <div class="w-[70%]">
                    <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                            <div class="w-max rounded-lg bg-gray-900 p-5 text-white">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                    class="h-6 w-6">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3"></path>
                                </svg>
                            </div>
                            <div>
                                <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                    Line Chart
                                </h6>
                                <p class="block max-w-sm font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                                    Visualize your data in a simple way using the
                                    @material-tailwind/html chart plugin.
                                </p>
                            </div>
                        </div>
                        <div class="pt-6 px-2 pb-0">
                            <div id="bar-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="w-[25%] w-full rounded-xl px-5 items-end">
                    <div class="w-[60%] space-y-5 px-5 rounded-xl bg-black py-12">
                        <div class="w-16 rounded-full h-8 bg-white flex justify-center items-center">New</div>
                        <div>
                            <h5 class="text-white font-semibold text-2xl">We have added new</h5>
                            <h5 class="text-white font-semibold text-2xl">Features</h5>
                        </div>
                        <div>
                            <p class="text-slate-400 text-xl">
                                New templates focused on helping you improve your business.
                            </p>
                        </div>
                        <div class="w-60 rounded-full h-8 bg-white flex justify-center items-center">Download Now</div>
                        
                    </div>

                </div>
            </div>

        </div>


    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const chartConfig = {
        series: [{
            name: "Sales",
            data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
        }, ],
        chart: {
            type: "bar",
            height: 240,
            toolbar: {
                show: false,
            },
        },
        title: {
            show: "",
        },
        dataLabels: {
            enabled: false,
        },
        colors: ["#020617"],
        plotOptions: {
            bar: {
                columnWidth: "40%",
                borderRadius: 2,
            },
        },
        xaxis: {
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            labels: {
                style: {
                    colors: "#616161",
                    fontSize: "12px",
                    fontFamily: "inherit",
                    fontWeight: 400,
                },
            },
            categories: [
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
        },
        yaxis: {
            labels: {
                style: {
                    colors: "#616161",
                    fontSize: "12px",
                    fontFamily: "inherit",
                    fontWeight: 400,
                },
            },
        },
        grid: {
            show: true,
            borderColor: "#dddddd",
            strokeDashArray: 5,
            xaxis: {
                lines: {
                    show: true,
                },
            },
            padding: {
                top: 5,
                right: 20,
            },
        },
        fill: {
            opacity: 0.8,
        },
        tooltip: {
            theme: "dark",
        },
    };

    const chart = new ApexCharts(document.querySelector("#bar-chart"), chartConfig);

    chart.render();
</script>