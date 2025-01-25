<div class="dashboard" onload="$wire.selectedTab = 'mwanzo-tab'">

    <x-tabs wire:model="selectedTab" default="mwanzo-tab">
        <x-tab name="mwanzo-tab" label="MWANZO" icon="o-home">
            <div class="flex items-center justify-center p-6 my-6 border">
                <div class="text-2xl font-bold text-gray-800 whitespace-nowrap lg:text-6xl">JUMLA YA KURA : {{ $totalVotes }}</div>
            </div>

            <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 lg:gap-4">
                <div class="w-full px-5 py-4 rounded-lg shadow truncat bg-base-100 text-ellipsis">
                    <div class="flex items-center gap-3">
                        <div class=" text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                              </svg>
                        </div>

                        <div class="text-left">
                            <div class="font-bold text-gray-800 text-md whitespace-nowrap lg:text-xl">JUMLA YA WAPIGA KURA</div>
                            <div class="text-xl font-black">{{ $noVoters }}</div>
                        </div>
                    </div>
                </div>


                <div class="w-full px-5 py-4 truncate rounded-lg shadow bg-base-100 text-ellipsis">
                    <div class="flex items-center gap-3">
                        <div class=" text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                              </svg>
                        </div>

                        <div class="text-left">
                            <div class="font-bold text-gray-800 text-md whitespace-nowrap lg:text-xl">WALIOJISAJILI KUPIGA KURA</div>

                        <div class="text-xl font-black">{{$noRegVoters;}}</div>
                        </div>
                    </div>
                </div>


                <div class="w-full px-5 py-4 truncate rounded-lg shadow bg-base-100 text-ellipsis">
                    <div class="flex items-center gap-3">
                        <div class=" text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                              </svg>
                        </div>

                        <div class="text-left">
                            <div class="font-bold text-gray-800 text-md whitespace-nowrap lg:text-xl">WALIOPIGA KURA</div>
                            <div class="text-xl font-black">{{ $totalVotes }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="chartContainer" class="w-full"></div>

        </x-tab>

        <x-tab name="takwimu-tab" label="TAKWIMU" icon="o-chart-bar">
            <div>Takwimu</div>
        </x-tab>
    </x-tabs>

    <script src="{{ asset('canvasjs.min.js') }}"></script>

    <script>
        window.onload = function () {

            var candidatesWithVotes = [
                { president_name: "{{ $candidatesWithVotes[0]['president_name'] }} NA {{ $candidatesWithVotes[0]['vice_name'] }}", votes_count: {{ $candidatesWithVotes[0]['votes_count'] }} },
                { president_name: "{{ $candidatesWithVotes[1]['president_name'] }} NA {{ $candidatesWithVotes[1]['vice_name'] }}", votes_count: {{ $candidatesWithVotes[1]['votes_count'] }} }
            ];

            var totalVotes = candidatesWithVotes.reduce(function (sum, candidate) {
                return sum + candidate.votes_count;
            }, 0);

            var dataPoints = candidatesWithVotes.map(function (candidate, index) {
                var percentage = (candidate.votes_count / totalVotes) * 100;
                return {
                    y: percentage,
                    label: candidate.president_name,
                    toolTipContent: `${candidate.president_name}: ${candidate.votes_count} votes (${percentage.toFixed(2)}%)`,
                    color: index === 0 ? "green" : "orange"
                };
            });

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                backgroundColor: "transparent",
                axisY: {
                    title: "Percentage of Total Votes (%)",
                    maximum: 100
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    legendText: "WAGOMBEA",
                    dataPoints: dataPoints
                }]
            });

            chart.render();
        }
    </script>

</div>
