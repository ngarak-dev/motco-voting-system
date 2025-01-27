<div class="dashboard">
    <div class="container mx-auto">
        <!-- Tab Buttons -->
        <div class="flex border-b border-gray-200 shadow bg-gray-50">
            <button wire:click="setTab('mwanzo')" class="px-4 py-2 font-bold text-gray-600 border-b-2 border-transparent hover:text-gray-800 focus:outline-none">MWANZO</button>
            <button wire:click="setTab('takwimu')" class="px-4 py-2 font-bold text-gray-600 border-b-2 border-transparent hover:text-gray-800 focus:outline-none">TAKWIMU</button>
            <button wire:click="setTab('muda')" class="px-4 py-2 font-bold text-gray-600 border-b-2 border-transparent hover:text-gray-800 focus:outline-none">MUDA WA UCHAGUZI</button>
        </div>

        <!-- Tab Content -->
        <div class="my-6 border shadow-lg">
            @if ($activeTab === 'mwanzo')
                <div class="p-4 rounded-md shadow bg-gray-50">
                    <div class="mwanzo-tab">
                        <div class="flex items-center justify-center p-6 my-6 border">
                            <div class="text-2xl font-bold whitespace-nowrap lg:text-6xl">JUMLA YA KURA : {{ $totalVotes }}</div>
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
                                        <div class="font-bold text-md whitespace-nowrap lg:text-xl">JUMLA YA WAPIGA KURA</div>
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
                                        <div class="font-bold text-md whitespace-nowrap lg:text-xl">WALIOJISAJILI KUPIGA KURA</div>

                                    <div class="text-xl font-black">{{ $noRegVoters }}</div>
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
                                        <div class="font-bold text-md whitespace-nowrap lg:text-xl">WALIOPIGA KURA</div>
                                        <div class="text-xl font-black">{{ $totalVotes }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @empty($candidatesWithVotes)
                            <div class="flex items-center justify-center p-6 my-6 border">
                                <div class="font-bold text-red-800 text-md whitespace-nowrap lg:text-xl">HAMNA KURA ILIYOPIGWA</div>
                            </div>
                        @else
                            <div class="flex items-center justify-center p-6 mt-4 border">
                                <div class="font-bold text-blue-500 text-md whitespace-nowrap lg:text-xl">
                                    MGAWANYO WA KURA KWA ASILIMIA
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 lg:gap-4">
                                @foreach ($candidatesWithVotes as $candidate)
                                    <div class="flex items-center justify-start p-2 my-2 border border-secondary">
                                        <x-avatar class="!w-14" :image="$candidate['president_img']" />
                                        <x-avatar class="!w-14" :image="$candidate['vice_img']" />
                                        <div class="font-bold text-green-500 text-md whitespace-nowrap lg:text-lg">
                                            <span class="ml-3">{{ $candidate['candidates_name'] }}</span>
                                        </div>
                                        <span class="ml-4" style="font-family: 'Gloock', sans-serif; font-size: 2.5em;">{{ $candidate['percentage'] }}%</span>
                                    </div>
                                @endforeach
                            </div>
                        @endempty
                    </div>
                </div>
            @elseif ($activeTab === 'takwimu')
                <div class="p-4 rounded-lg shadow bg-gray-50">
                    <h2 class="text-xl font-bold">TAKWIMU</h2>

                    <div class="w-full p-2 mx-auto my-8 bg-white rounded-md shadow-md">
                        <h2 class="mb-4 text-xl text-center">IDADI YA KURA</h2>
                        <div class="flex items-center justify-center">
                            <div id="votesCountLoader" class="w-4 h-4 text-center border-4 border-blue-600 rounded-full loader border-t-transparent animate-spin"></div>
                        </div>

                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div class="w-full" style="height: 500px; width: :100%; margin: 0 auto;">
                                <canvas id="votesCountChart"></canvas>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="grid grid-cols-1 gap-4 my-6 lg:grid-cols-2 lg:gap-6">

                        <div class="w-full p-2 mx-auto bg-white rounded-md shadow-md">
                            <h2 class="mb-4 text-xl text-center">MWAKA WA MASOMO</h2>
                            <div class="flex items-center justify-center">
                                <div id="byYearLoader" class="w-4 h-4 text-center border-4 border-blue-600 rounded-full loader border-t-transparent animate-spin"></div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div style="width: 60%; max-width: 300px;">
                                    <canvas id="byYearPieChart"></canvas>
                                </div>
                                <div id="byYearStats" style="width: 35%; margin-left: 20px;">
                                    {{-- Numbers will appear here --}}
                                </div>
                            </div>
                        </div>

                        <div class="w-full p-2 mx-auto bg-white rounded-md shadow-md">
                            <h2 class="mb-4 text-xl text-center">JINSIA</h2>
                            <div class="flex items-center justify-center">
                                <div id="bySexLoader" class="w-4 h-4 text-center border-4 border-blue-600 rounded-full loader border-t-transparent animate-spin"></div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div style="width: 60%; max-width: 300px;">
                                    <canvas id="bySexPieChart"></canvas>
                                </div>
                                <div id="bySexStats" style="width: 35%; margin-left: 20px;">
                                    {{-- Numbers will appear here --}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            @elseif ($activeTab === 'muda')
                <div class="p-4 rounded-lg shadow bg-gray-50">
                    <h2 class="text-xl font-bold">WEKA MUDA WA UCHGUZI</h2>

                    <x-form wire:submit='setElectionTime'>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="m-4 start">
                                <label for="start">MUDA WA KUFUNGUA</label> <br>
                                <input type="datetime-local" name="start" wire:model='start' class="w-full input input-success"  id="start" required>
                            </div>
                            <div class="m-4 end">
                                <label for="end">MUDA WA KUFUNGA</label> <br>
                                <input type="datetime-local" name="end" wire:model='end' class="w-full input input-success"  id="end" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">WEKA MUDA</button>
                    </x-form>

                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setInterval(() => {
                console.log('Refreshing data...');
                // $wire.dispatchSelf('refreshData');
                @this.dispatchSelf('refreshData');
            }, 180000); // 3 minutes
        });
    </script>

    <script>
        // window.onload = function() {
        //     fetchAllStats();
        // };
        document.addEventListener('DOMContentLoaded', function() {
            fetchAllStats();
        });

        function fetchAllStats () {
            fetch('{{ route('get-full-stats') }}')
                .then(response => response.json())
                .then(response => {
                    if (response.code) {
                        console.log(response);
                        //Load chart
                        setTimeout(function() {
                            createBarChart(response);

                        const sexLabels = Object.keys(response.data.votersBySex);
                        const sexValues = Object.values(response.data.votersBySex);
                        createPieChart(sexLabels, sexValues, 'MWAKA WA MASOMO', 'bySexPieChart', 'bySexStats');

                        const yearLabels = Object.keys(response.data.votersByYear);
                        const yearValues = Object.values(response.data.votersByYear);
                        createPieChart(yearLabels, yearValues, 'JINSIA', 'byYearPieChart', 'byYearStats');

                        }, 5000);
                    }
                    else {
                        console.error(response);
                    }
                })
            .catch(error => {
                console.error('Error fetching statistics:', error);
            });
        }

        function createBarChart (responseData) {
            const candidates = responseData.data.candidatesVotes.map(candidate => candidate.candidates_name);
            const voteCounts = responseData.data.candidatesVotes.map(candidate => candidate.vote_count);
            const nonRegisteredVoters = responseData.data.nonRegisteredVoters;
            const registeredNotVoted = responseData.data.registeredNotVoted;

            // Add additional categories
            candidates.push("WASIOSHIRIKI", "ZILIZOHARIBIKA");
            voteCounts.push(nonRegisteredVoters, registeredNotVoted);

            const ctx = document.getElementById('votesCountChart').getContext('2d');

            const votesCountChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: candidates,
                    datasets: [{
                        label: 'KURA',
                        data: voteCounts,
                        backgroundColor: [
                            '#4CAF50', '#2196F3', '#FFC107','#FF5722',
                        ],
                        borderColor: [
                            '#4CAF50', '#2196F3', '#FFC107','#FF5722',
                        ],
                        borderWidth: 2,
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: '#333',
                                font: {
                                    size: 16,
                                    weight: 'bold'
                                }
                            },
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    let value = tooltipItem.raw;
                                    return `${tooltipItem.label}: ${value}`;
                                }
                            }
                        },

                        // Plugin to display numbers on bars
                        datalabels: {
                            display: true,
                            anchor: 'end',
                            align: 'top',
                            formatter: (value, context) => {
                                return `KURA ${value}`;
                            },
                            color: '#000',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#555',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#ddd',
                                lineWidth: 0.8,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                color: '#555',
                                font: {
                                    size: 12
                                },
                                // stepSize: Math.ceil(total / 5),
                            },
                            title: {
                                display: true,
                                text: '',
                                color: '#333',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeOutBounce'
                    },
                    layout: {
                        padding: {
                            top: 20,
                            bottom: 10
                        }
                    }
                },
                plugins: [ChartDataLabels] // Plugin to display numbers
            });

            document.getElementById('votesCountLoader').classList.add('hidden');
        }

        function createPieChart(labels, values, statTitle, pieChartId, statsContainerId) {
            const ctx = document.getElementById(pieChartId).getContext('2d');

            const statsContainer = document.getElementById(statsContainerId);
            statsContainer.innerHTML = '';

            let total = values.reduce((sum, val) => sum + val, 0);
            labels.forEach((label, index) => {
                let percentage = ((values[index] / total) * 100).toFixed(2);
                let statItem = document.createElement('div');
                statItem.style.marginBottom = '10px';
                statItem.innerHTML = `<i>${label}:</i> <strong>${values[index]}</strong>`;
                statsContainer.appendChild(statItem);
            });

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: statTitle,
                        data: values,
                        borderWidth: 2,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    let value = tooltipItem.raw;
                                    let percentage = ((value / total) * 100).toFixed(2);
                                    return `${tooltipItem.label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    },
                }
            });

            document.getElementById('bySexLoader').classList.add('hidden');
            document.getElementById('byYearLoader').classList.add('hidden');
        }
    </script>
</div>
