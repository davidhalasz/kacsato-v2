<x-guest-layout>
    <div class="min-h-screen pt-[100px] pb-20">
        <div class="container mx-auto flex justify-between items-center mb-4">
            <h1 class="text-greenText font-bold boldPoppins text-2xl">Kacsa tavi eseménynaptár</h1>
        </div>

        <div class="container mx-auto flex gap-3">
            <div id="kacsato-cards" class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 px-2">
                <div id="calendar-target" class="flex-none mx-auto" data-first-day-of-the-week="2"></div>


            </div>
        </div>

        <div class="w-full relative min-h-[300px] mt-20">
            <div class="absolute z-[-5] w-full h-[250px] bg-[#263d8e] opacity-40"></div>
            <div class="container mx-auto flex flex-col px-2">
                <h2 class="text-2xl text-[#263d8e] font-bold mb-4 pb-4 pt-10">Szarvasi programok</h2>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($szarvas as $event)
                        @php
                            setlocale(LC_TIME, 'hu_HU.UTF-8');
                            $startDate = new DateTime($event->start_date);
                            $formattedStartDate = strftime('%Y. %b. %e', $startDate->getTimestamp());

                            $formattedDate = '';
                            if ($event->end_date != null) {
                                $endDate = new DateTime($event->end_date);
                                $formattedEndDate = strftime('%Y. %b. %e', $endDate->getTimestamp());

                                $formattedDate = $formattedStartDate . ' - ' . $formattedEndDate;
                            } else {
                                $formattedDate = $formattedStartDate;
                            }

                        @endphp
                        <div onclick="openModal({{ $event }})"
                            class="event-card bg-white rounded-md hover:shadow-lg">
                            <div class="h-[200px] rounded-t-md">
                                <img class="w-full h-full object-cover object-top rounded-t-md"
                                    src="{{ URL::to('storage/' . $event->filepath) }}" alt="" srcset="">
                            </div>
                            <div class="flex flex-col px-2 py-4">
                                <h2 class="font-bold text-lg">{{ $event->title }}</h2>
                                <div class="border-b-2 border-gray-300 py-2 mb-4"></div>
                                <div class="flex gap-2 text-sm font-bold text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                    </svg>
                                    <p>{{ $formattedDate }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="w-full relative min-h-[300px] mt-20">
            <div class="absolute z-[-5] w-full h-[250px] bg-[#7F0B0C] opacity-40"></div>
            <div class="container mx-auto flex flex-col px-2">
                <h2 class="text-2xl text-[#7F0B0C] font-bold mb-4 pb-4 pt-10">Cervinus programok</h2>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($cervinus as $event)
                        @php
                            setlocale(LC_TIME, 'hu_HU.UTF-8');
                            $startDate = new DateTime($event->start_date);
                            $formattedStartDate = strftime('%Y. %b. %e', $startDate->getTimestamp());

                            $formattedDate = '';
                            if ($event->end_date != null) {
                                $endDate = new DateTime($event->end_date);
                                $formattedEndDate = strftime('%Y. %b. %e', $endDate->getTimestamp());

                                $formattedDate = $formattedStartDate . ' - ' . $formattedEndDate;
                            } else {
                                $formattedDate = $formattedStartDate;
                            }

                        @endphp
                        <div onclick="openModal({{ $event }})"
                            class="event-card bg-white rounded-md hover:shadow-lg">
                            <div class="h-[200px] rounded-t-md">
                                <img class="w-full h-full object-cover object-top rounded-t-md"
                                    src="{{ URL::to('storage/' . $event->filepath) }}" alt="" srcset="">
                            </div>
                            <div class="flex flex-col px-2 py-4">
                                <h2 class="font-bold text-lg">{{ $event->title }}</h2>
                                <div class="border-b-2 border-gray-300 py-2 mb-4"></div>
                                <div class="flex gap-2 text-sm font-bold text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                    </svg>
                                    <p>{{ $formattedDate }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



        <!-- MODAL -->
        <div class="z-[400] fixed hidden top-0 left-0 w-full h-full outline-none overflow-x-hidden overflow-y-auto backdrop-blur-sm bg-black/30"
            id="modalScrollable" tabindex="-1" aria-labelledby="modalScrollableLabel" aria-hidden="true">
            <div id="modal-window"
                class="sm:h-[calc(100%-3rem)] max-w-2xl my-6  px-4 mx-auto relative w-auto pointer-events-none">
                <div
                    class="max-h-full overflow-hidden border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div
                        class="flex flex-shrink-0 items-center justify-center p-4 border-b border-gray-200 rounded-t-md">
                        <h5 class="text-2xl text-gray-800 text-center" id="modalScrollableLabel">
                            Modal title
                        </h5>
                    </div>
                    <div class="flex w-full justify-between p-4">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                            <div class="flex flex-col">
                                <h2>DÁTUM</h2>
                                <p id="modalDate"></p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="flex flex-col">
                                <h2>IDŐPONT</h2>
                                <p id="modalTime"></p>
                            </div>
                        </div>
                    </div>
                    <div id="modalContent" class="flex-auto overflow-y-auto relative p-4">
                        <img id="modalImg" class="object-fit" src="" alt="">
                    </div>
                    <div
                        class="flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <button id="modalButton" type="button"
                            class="inline-block px-6 py-2.5 bg-btnGreen text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                            Bezárás
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modalBtn = document.getElementById('modalButton');
                const modalElement = document.getElementById('modalScrollable');
                modalBtn.addEventListener('click', function() {
                    modalElement.classList.add('hidden');
                });

                modalElement.addEventListener('click', function(event) {
                    if (event.target.id === 'modalScrollable') {
                        modalElement.classList.add('hidden');
                    }
                });
            });

            var resData = @json($kacsatavi);
            var kacsatoEventsElement = document.getElementById("kacsato-cards");
            var calendarElement = document.getElementById("calendar-target");
            let checkDate = new Date();
            var baseUrl = "{{ URL::to('/') }}";

            highlightedDates = [];

            for (var key in resData) {
                if (resData.hasOwnProperty(key)) {
                    if (resData[key]['end_date']) {
                        pushDates(resData[key]['start_date'].split(' ')[0], resData[key]['end_date'].split(' ')[0])
                    } else {
                        highlightedDates.push(new Date(resData[key]['start_date']));
                    }
                }
            }

            // init calendar
            const date = new Date();

            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();

            var myCalendar = jsCalendar.new({
                target: calendarElement,
                date: `${day}/${month}/${year}`,
                min: `${day}/${month}/${year}`,
                monthFormat: "month YYYY",
                language: "hu",
                dayFormat: "DDD",
            });

            let cardIndex = 0;
            
            // first time display today events 
            for (var key in resData) {
                if (resData.hasOwnProperty(key)) {
                    addEventCards(resData[key], checkDate);
                }
            }

            cardIndex = 0;

            myCalendar.onDateClick(function(event, date) {
                let cardElements = document.getElementsByClassName('kacsato-event-card');
                Array.from(cardElements).forEach(function(element) {
                    element.remove();
                });

                checkDate = date;
                for (var key in resData) {
                    if (resData.hasOwnProperty(key)) {
                        addEventCards(resData[key], checkDate);
                    }
                }
                cardIndex = 0;
            });

            myCalendar.select(highlightedDates);

            calendarElement.classList.add('material-theme', 'green')

            myCalendar.onDateClick(function(event, date) {
                myCalendar.set(date);
            });

            function pushDates(startDate, endDate) {
                var currentDate = new Date(startDate);
                var end = new Date(endDate);

                while (currentDate <= end) {
                    highlightedDates.push(new Date(currentDate));
                    currentDate.setDate(currentDate.getDate() + 1);
                }
            }

            
            function addEventCards(item, checkDate) {
                
                if (dateCheck(item.start_date, item.end_date, checkDate)) {
                    let durationNumber = 1000;
                    let durationClassName = `duration-[1000ms]`;
                    
                    let startPart = item.start_date.split(' ')[0];
                    let dateString = formatDate(startPart);

                    if (item.end_date != null) {
                        dateString += ` - ${formatDate(item.end_date.split(' ')[0])}`;
                    }

                    let imgURL = baseUrl + '/storage/' + item.filepath;

                    let cardDiv = document.createElement('div');

                    

                    cardDiv.classList.add('kacsato-event-card', 'bg-white', 'rounded-md', 'hover:shadow-lg', 'opacity-0',
                        'transition-opacity', durationClassName, 'ease-in-out');

                    cardDiv.innerHTML = `
                        <div class="h-[200px] rounded-t-md">
                            <img class="w-full h-full object-cover object-top rounded-t-md" src="${imgURL}" alt="" srcset="">
                        </div>
                        <div class="flex flex-col px-2 py-4">
                            <h2 class="font-bold text-lg">${item.title}</h2>
                            <div class="border-b-2 border-gray-300 py-2 mb-4"></div>
                            <div class="flex gap-2 text-sm font-bold text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                                <p>${dateString}</p>
                            </div>
                        </div>
                    `;

                    cardDiv.addEventListener('click', function() {
                        openModal(item);
                    });

                    kacsatoEventsElement.appendChild(cardDiv);

                    requestAnimationFrame(() => {
                        cardDiv.classList.remove('opacity-0');
                    });
                    cardIndex += cardIndex + 1;
                }
            }

            function dateCheck(from, to, check) {
                let fromDate = new Date(from.split(' ')[0]);
                fromDate.setHours(0, 0, 0, 0);

                let checkDate = new Date(check);
                checkDate.setHours(0, 0, 0, 0);

                if (to === null) {
                    if (check.getTime() === fromDate.getTime()) {
                        return true;
                    }
                    return false;
                } else {
                    let toDate = new Date(to.split(' ')[0]);
                    toDate.setHours(0, 0, 0, 0);

                    if ((check <= toDate && check >= fromDate)) {
                        return true;
                    }
                    return false;
                }
            }

            function formatDate(inputDate) {
                let months = ["jan.", "febr.", "márc.", "ápr.", "máj.", "jún.", "júl.", "aug.",
                    "szept.", "okt.", "nov.", "dec."
                ];

                const dateObj = new Date(inputDate);
                const year = dateObj.getFullYear();
                const month = months[dateObj.getMonth()];
                const day = dateObj.getDate();

                const formattedDate = `${year}. ${month} ${day}.`;

                return formattedDate;
            }

            const inputDate = "2024-01-10";
            const formattedDate = formatDate(inputDate);
        </script>

        <script>
            function openModal(data) {
                const modalElement = document.getElementById('modalScrollable');
                const modalLabel = document.getElementById('modalScrollableLabel');

                var baseUrl = "{{ URL::to('/') }}";

                modalElement.classList.remove('hidden');
                modalLabel.textContent = data['title'];
                modalImg.src = baseUrl + '/storage/' + data['filepath'];
                if (data['is_all_day']) {
                    modalTime.textContent = "Egész nap";
                } else {
                    let parts = data['start_date'].split(' ');
                    let timeParts = parts[1].split(':');

                    let timeresult = `${timeParts[0]}:${timeParts[1]}`;
                    modalTime.textContent = timeresult;
                }

                if (data['end_date']) {
                    modalDate.textContent =
                        `${generateModalDateStr(data['start_date'])} - ${generateModalDateStr(data['end_date'])}`;
                } else {
                    modalDate.textContent =
                        `${generateModalDateStr(data['start_date'])}`;
                }

            }

            function generateModalDateStr(datetimeStr) {
                let parts = datetimeStr.split(' ');
                let dateParts = parts[0].split('-');

                let months = ["jan.", "febr.", "márc.", "ápr.", "máj.", "jún.", "júl.", "aug.",
                    "szept.", "okt.", "nov.", "dec."
                ];

                let shortMonth = months[dateParts[1] - 1];

                return `${dateParts[0]}. ${shortMonth} ${dateParts[2]}.`;
            }
        </script>
    </div>
</x-guest-layout>
