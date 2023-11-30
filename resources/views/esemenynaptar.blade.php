<x-guest-layout>
    <div class="container mx-auto pt-[100px] pb-20">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-blue-400 font-bold boldPoppins text-2xl">Kacsa tavi eseménynaptár</h1>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
            <!-- Naptár -->
            <div class="bg-white shadow-lg p-4 rounded-lg h-fit">
                <div class="flex justify-between pb-4 gap-8">
                    <button id="prevMonthBtn" class="flex items-center w-[110px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                        </svg>
                        <p id="prevMonthName"></p>
                    </button>

                    <div class="text-center font-bold text-lg w-[200px]">
                        <h2 id="navTitleYear"></h2>
                        <h2 id="navTitleMonth"></h2>
                    </div>

                    <button id="nextMonthBtn" class="flex items-center w-[110px] justify-end">
                        <p id="nextMonthName"></p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
                <div id="calendar" class="">
                </div>
            </div>


            <!-- Események -->
            <div id="events" class="flex-1 bg-white shadow-lg p-4 rounded-lg">
                <h2 id='currentEventMonth' class="text-lg font-bold mb-2 text-center">Esemény(ek)</h2>
                <h2 id='currentEventDay' class="text-lg font-bold mb-2 text-center"></h2>
                <div id="events-list" class="flex flex-col">
                    <!-- Az események itt jelennek meg -->
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 px-2">
            <div class="shadow-lg p-4 rounded-lg bg-[#263d8e] text-white">
                <h2 class="text-xl font-bold mb-4">Szarvasi programok</h2>
                @foreach ($szarvas as $event)
                    @php
                        setlocale(LC_TIME, 'hu_HU.UTF-8');
                        $date = new DateTime($event->start_date);
                        $formattedDate = strftime('%b. %e', $date->getTimestamp());
                    @endphp
                    <div onclick="openModal({{ $event }})" class="flex gap-2 text-lg shadow-lg p-2 my-1 cursor-pointer hover:bg-blue-800">
                        <p class="w-[70px] font-bold">{{ $formattedDate }}</p>
                        <p class="flex-1">{{ $event->title }}</p>
                    </div>
                @endforeach
            </div>
            <div class="shadow-lg p-4 rounded-lg bg-[#7F0B0C] text-white">
                <h2 class="text-xl font-bold mb-4">Cervinus programok</h2>
                @foreach ($cervinus as $event)
                    @php
                        setlocale(LC_TIME, 'hu_HU.UTF-8');
                        $date = new DateTime($event->start_date);
                        $formattedDate = strftime('%b. %e', $date->getTimestamp());
                    @endphp
                    <div onclick="openModal({{ $event }})" class="flex gap-2 text-lg shadow-lg p-2 my-1 cursor-pointer hover:bg-red-800">
                        <p class="w-[70px] font-bold">{{ $formattedDate }}</p>
                        <p class="flex-1">{{ $event->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- MODAL -->
        <div class="z-[400] fixed hidden top-0 left-0 w-full h-full outline-none overflow-x-hidden overflow-y-auto backdrop-blur-sm bg-black/30"
            id="modalScrollable" tabindex="-1" aria-labelledby="modalScrollableLabel" aria-hidden="true">
            <div class="sm:h-[calc(100%-3rem)] max-w-2xl my-6  px-4 mx-auto relative w-auto pointer-events-none">
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
                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                            Bezaras
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function generateModalDateStr(datetimeStr) {
                let parts = datetimeStr.split(' ');
                let dateParts = parts[0].split('-');

                let months = ["jan.", "febr.", "márc.", "ápr.", "máj.", "jún.", "júl.", "aug.",
                    "szept.", "okt.", "nov.", "dec."
                ];

                let shortMonth = months[dateParts[1] - 1];

                return `${dateParts[0]} ${shortMonth} ${dateParts[2]}`;
            }

            document.addEventListener('DOMContentLoaded', function() {
                const calendarElement = document.getElementById('calendar');
                const eventsElement = document.getElementById('events-list');
                const currentDate = new Date();
                let currentMonth = currentDate.getMonth();
                let currentYear = currentDate.getFullYear();
                const monthTitle = document.getElementById('currentEventMonth');
                const dayTitle = document.getElementById('currentEventDay');

                const clockSVG = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                `

                const modalElement = document.getElementById('modalScrollable');
                const modalLabel = document.getElementById('modalScrollableLabel');
                const modalBtn = document.getElementById('modalButton');
                const modalContent = document.getElementById('modalContent');
                const modalImg = document.getElementById('modalImg');
                const modalDate = document.getElementById('modalDate');
                const modalTime = document.getElementById('modalTime');

                const prevMonthBtn = document.getElementById('prevMonthBtn');
                const nextMonthBtn = document.getElementById('nextMonthBtn');
                const prevMonthName = document.getElementById('prevMonthName');
                const nextMonthName = document.getElementById('nextMonthName');
                const navTitleMonth = document.getElementById('navTitleMonth');
                const navTitleYear = document.getElementById('navTitleYear');

                var baseUrl = "{{ URL::to('/') }}";

                let activedDay = '';
                var resData = {!! $kacsatavi !!};

                function daysInMonth(month, year) {
                    return new Date(year, month + 1, 0).getDate();
                }

                function generateCalendar(month, year) {
                    let firstDay = new Date(year, month, 1).getDay();
                    firstDay = (firstDay === 0) ? 6 : firstDay - 1;
                    let totalDays = daysInMonth(month, year);

                    // Clear existing calendar
                    calendarElement.innerHTML = '';

                    if (month < 11) {
                        nextMonthName.textContent = getMonthName(month + 1);
                    } else {
                        nextMonthName.textContent = getMonthName(0);
                    }

                    if (month === 0) {
                        prevMonthName.textContent = getMonthName(11);
                    } else {
                        prevMonthName.textContent = getMonthName(month - 1);
                    }

                    navTitleMonth.textContent = getMonthName(month);
                    navTitleYear.textContent = currentYear;

                    // Weekdays header
                    const weekDays = ['H', 'K', 'SZ', 'CS', 'P', 'SZ', 'V'];
                    let headerRow = document.createElement('div');
                    headerRow.className = 'flex text-center font-bold';
                    weekDays.forEach(day => {
                        let dayElement = document.createElement('div');
                        dayElement.className = 'flex-1';
                        dayElement.textContent = day;
                        headerRow.appendChild(dayElement);
                    });
                    calendarElement.appendChild(headerRow);

                    // Days of the month
                    let date = 1;
                    for (let i = 0; i < 6; i++) { // 6 weeks to cover all days
                        let row = document.createElement('div');
                        row.className = 'flex';

                        for (let j = 0; j < 7; j++) {
                            let cell = document.createElement('div');
                            cell.className = 'flex-1 flex justify-center items-center';

                            let paragraph = document.createElement('p');
                            paragraph.classList.add('rounded-full', 'h-10', 'w-10', 'flex', 'justify-center',
                                'items-center', 'cursor-pointer');

                            if (i === 0 && j < firstDay) {
                                paragraph.textContent = ''; // Empty cell
                            } else if (date > totalDays) {
                                paragraph.textContent = ''; // Empty cell for days beyond the total
                            } else {
                                paragraph.textContent = date;
                                paragraph.classList.add('day');
                                paragraph.dataset.day = date;
                                paragraph.dataset.month = month + 1;
                                paragraph.dataset.year = year;

                                date++;
                            }

                            cell.appendChild(paragraph);
                            row.appendChild(cell);
                        }

                        calendarElement.appendChild(row);
                    }

                    addBorderWhenThereIsEvent(month + 1, year);
                }

                function addBorderWhenThereIsEvent(month, year) {
                    let days = document.getElementsByClassName('day');

                    for (i = 0; i < resData.length; i++) {
                        let startParts = resData[i]['start_date'].split(' ');
                        let startDateParts = startParts[0].split('-');

                        if (resData[i]['end_date']) {
                            let endParts = resData[i]['end_date'].split(' ');
                            let endDateParts = endParts[0].split('-');

                            if (startDateParts[0] === endDateParts[0]) {
                                if (startDateParts[1] === endDateParts[1]) {
                                    for (let d = parseInt(startDateParts[2]); d <= parseInt(endDateParts[2]); d++) {
                                        if (parseInt(days[d - 1].dataset.year) === parseInt(startDateParts[0]) &&
                                            parseInt(days[d - 1].dataset.month) === parseInt(startDateParts[1]) &&
                                            parseInt(days[d - 1].dataset.day) === d) {
                                            days[d - 1].classList.add('border', 'border-blue-500');
                                        }
                                    }
                                }
                            }
                        } else {
                            for (let j = 0; j < days.length; j++) {
                                if (parseInt(days[j].dataset.year) === parseInt(startDateParts[0]) &&
                                    parseInt(days[j].dataset.month) === parseInt(startDateParts[1]) &&
                                    parseInt(days[j].dataset.day) === parseInt(startDateParts[2])) {
                                    days[j].classList.add('border', 'border-blue-500');
                                }
                            }
                        }


                    }
                }

                function getMonthName(num) {
                    let months = ["január", "február", "március", "április", "május", "június", "július", "augusztus",
                        "szeptember", "október", "november", "december"
                    ];
                    return months[num];
                }

                function getHoursAndMinutes(datetimeStr) {
                    let parts = datetimeStr.split(' ');
                    let timeParts = parts[1].split(':');

                    return `${timeParts[0]}:${timeParts[1]}`;
                }



                function showEventsForDay(day) {

                    eventsElement.innerHTML = '';

                    let days = document.getElementsByClassName('day');
                    let countEvent = 0;

                    for (let i = 0; i < days.length; i++) {
                        if (days[i].dataset.day === activedDay) {
                            days[i].classList.remove('bg-blue-500', 'text-white');
                        }

                        if (days[i].dataset.day === day) {
                            days[i].classList.add('bg-blue-500', 'text-white');

                            monthTitle.textContent = getMonthName(days[i].dataset.month - 1).toUpperCase();
                            dayTitle.textContent = days[i].dataset.day.toString();

                            for (let j = 0; j < resData.length; j++) {
                                eventDate = new Date(Date.parse(resData[j]['start_date']));

                                if (resData[j]['end_date']) {
                                    let startParts = resData[j]['start_date'].split(' ');
                                    let startDate = new Date(startParts[0]);

                                    let endParts = resData[j]['end_date'].split(' ');
                                    let endDate = new Date(endParts[0]);
                                    let checkDateStr =
                                        `${days[i].dataset.year}-${days[i].dataset.month}-${days[i].dataset.day}`;
                                    let dateToCheck = new Date(checkDateStr);

                                    if (dateToCheck >= startDate && dateToCheck <= endDate) {
                                        //lista div
                                        let listRow = document.createElement('div');
                                        listRow.className = 'w-full flex flex-col py-4 border-b border-gray-200';
                                        listRow.dataset.eventid = resData[j]['id'];

                                        //ido sor
                                        let clockRow = document.createElement('div');
                                        clockRow.className = 'w-full flex';

                                        let clockIcon = document.createElement('div');
                                        clockIcon.className = 'text-gray-500 pr-2';
                                        clockIcon.innerHTML = clockSVG;
                                        clockRow.appendChild(clockIcon);

                                        let rowDateInfo = document.createElement('div');
                                        rowDateInfo.className = 'text-gray-500';
                                        if (resData[j]['is_all_day']) {
                                            rowDateInfo.textContent = "Egész nap";
                                        } else {
                                            rowDateInfo.textContent =
                                                `${getHoursAndMinutes(resData[j]['start_date'])} - ${getHoursAndMinutes(resData[j]['end_date'])}`;
                                        }

                                        clockRow.appendChild(rowDateInfo);

                                        listRow.appendChild(clockRow);

                                        //cimsor
                                        let rowTitle = document.createElement('div');
                                        rowTitle.className = 'font-bold py-2 cursor-pointer hover:text-purple-800';
                                        rowTitle.textContent = resData[j]['title'];
                                        listRow.appendChild(rowTitle);

                                        //modal
                                        rowTitle.addEventListener('click', function() {
                                            modalElement.classList.remove('hidden');
                                            modalLabel.textContent = resData[j]['title'];
                                            modalImg.src = baseUrl + '/storage/' + resData[j]['filepath'];
                                            if (resData[j]['is_all_day']) {
                                                modalTime.textContent = "Egész nap";
                                            } else {
                                                modalTime.textContent = getHoursAndMinutes(resData[j][
                                                    'start_date'
                                                ]);
                                            }

                                            modalDate.textContent =
                                                `${generateModalDateStr(resData[j]['start_date'])} - ${generateModalDateStr(resData[j]['end_date'])}`;
                                        })

                                        eventsElement.appendChild(listRow);
                                        countEvent++;
                                    }
                                } else {
                                    if (days[i].dataset.day === eventDate.getDate().toString() && days[i].dataset
                                        .year ===
                                        eventDate.getFullYear().toString() && days[i].dataset.month === (eventDate
                                            .getMonth() + 1)
                                        .toString()) {

                                        //lista div
                                        let listRow = document.createElement('div');
                                        listRow.className = 'w-full flex flex-col py-4 border-b border-gray-200';
                                        listRow.dataset.eventid = resData[j]['id'];

                                        //ido sor
                                        let clockRow = document.createElement('div');
                                        clockRow.className = 'w-full flex';

                                        let clockIcon = document.createElement('div');
                                        clockIcon.className = 'text-gray-500 pr-2';
                                        clockIcon.innerHTML = clockSVG;
                                        clockRow.appendChild(clockIcon);

                                        let rowDateInfo = document.createElement('div');
                                        rowDateInfo.className = 'text-gray-500';
                                        if (resData[j]['is_all_day']) {
                                            rowDateInfo.textContent = "Egész nap";
                                        } else {
                                            rowDateInfo.textContent = getHoursAndMinutes(resData[j]['start_date']);
                                        }

                                        clockRow.appendChild(rowDateInfo);

                                        listRow.appendChild(clockRow);

                                        //cimsor
                                        let rowTitle = document.createElement('div');
                                        rowTitle.className = 'font-bold py-2 cursor-pointer hover:text-purple-800';
                                        rowTitle.textContent = resData[j]['title'];
                                        listRow.appendChild(rowTitle);

                                        //modal
                                        rowTitle.addEventListener('click', function() {
                                            modalElement.classList.remove('hidden');
                                            modalLabel.textContent = resData[j]['title'];
                                            modalImg.src = baseUrl + '/storage/' + resData[j]['filepath'];
                                            modalTime.textContent = getHoursAndMinutes(resData[j][
                                                'start_date'
                                            ]);
                                            modalDate.textContent = generateModalDateStr(resData[j][
                                                'start_date'
                                            ]);
                                        })

                                        eventsElement.appendChild(listRow);
                                        countEvent++;
                                    }
                                }
                            }

                        }
                    }
                    activedDay = day;

                    if (countEvent === 0) {
                        let emptyDiv = document.createElement('div');
                        
                        emptyDiv.textContent = "Ezen a napon nincs esemény. Válassz másik napot.";
                        emptyDiv.className = 'w-full h-full text-center font-bold pt-10';

               
                        eventsElement.appendChild(emptyDiv);
                    }
                }

                generateCalendar(currentMonth, currentYear);
                showEventsForDay(currentDate.getDate().toString());


                calendarElement.addEventListener('click', function(event) {
                    if (event.target.classList.contains('day')) {
                        const day = event.target.dataset.day;
                        showEventsForDay(day);
                    }
                });

                modalBtn.addEventListener('click', function() {
                    modalElement.classList.add('hidden');
                });



                prevMonthBtn.addEventListener('click', function() {
                    console.log('clicked');
                    if (currentMonth === 0) {
                        currentMonth = 11;
                        currentYear = currentYear - 1
                    } else {
                        currentMonth = currentMonth - 1;
                    }
                    generateCalendar(currentMonth, currentYear);
                });

                nextMonthBtn.addEventListener('click', function() {
                    if (currentMonth === 11) {
                        currentMonth = 0;
                        currentYear = currentYear + 1
                    } else {
                        currentMonth = currentMonth + 1;
                    }
                    generateCalendar(currentMonth, currentYear);
                });

            });

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
                    modalTime.textContent = getHoursAndMinutes(data['start_date']);
                }

                if (data['end_date']) {
                    modalDate.textContent =
                    `${generateModalDateStr(data['start_date'])} - ${generateModalDateStr(data['end_date'])}`;
                } else {
                    modalDate.textContent =
                    `${generateModalDateStr(data['start_date'])}`;
                }
                
            }
        </script>
    </div>
</x-guest-layout>
