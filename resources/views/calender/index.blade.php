@extends('layout.presensi')
@section('header')


<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Calender</div>
    <div class="right"></div>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

body {
    font-family: "Montserrat", sans-serif;
}

#calendar {
    max-width: 800px;
    margin: 40px auto;
    background: #fff;
    padding: 15px;

}

.fc-event {
    border: 1px solid #eee !important;
}

.fc-content {
    padding: 3px !important;
}

.fc-content .fc-title {
    display: block !important;
    overflow: hidden;
    text-align: center;
    font-size: 12px;
    font-weight: 500;
    text-align: center;
}

.fc-customButton-button {
    font-size: 13px !important;
    position: absolute;
    top:  0px;
    left: 50%;
    transform: translateY(-50%);
}



.form-group {
    margin-bottom: 1rem;
}

.form-group>label {
    margin-bottom: 10px;
}

#delete-modal .modal-footer > .btn {

    border-radius: 3px !important; 
    padding: 0px 8px !important;
    font-size: 15px;

 }




.fc-scroller {
    overflow-y: hidden !important;
}

.context-menu {
    position: absolute;
    z-index: 1000;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
    padding: 5px;
}

/* .context-menu.show {
    display: block;
  } */

.context-menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;

}

.context-menu ul>li {
    display: block;
    ;
    padding: 5px 15px;
    list-style-type: none;
    color: #333;
    display: block;
    cursor: pointer;
    margin: 0 auto;
    transition: 0.10s;
    font-size: 13px;


}

.context-menu ul>li:hover {
    color: #fff;
    background-color: #007bff;
    border-radius: 2px;

}

.fa,
.fas {
    font-size: 13px;
    margin-right: 4px;
}
</style>

@section('content')

<div id='calendar'></div>

<div id="calendar" class="fc fc-ltr fc-unthemed" style=""><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><h2>April 2024</h2></div><div class="fc-center"><button type="button" class="fc-customButton-button fc-button fc-button-primary">Add Event</button></div><div class="fc-right"><button type="button" class="fc-today-button fc-button fc-button-primary">today</button><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-button-primary" aria-label="prev"><span class="fc-icon fc-icon-chevron-left"></span></button><button type="button" class="fc-next-button fc-button fc-button-primary" aria-label="next"><span class="fc-icon fc-icon-chevron-right"></span></button></div></div></div><div class="fc-view-container"><div class="fc-view fc-dayGridMonth-view fc-dayGrid-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden scroll; height: 240px;"><div class="fc-day-grid"><div class="fc-row fc-week fc-widget-content" style=""><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2024-03-31"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-04-01"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-04-02"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-04-03"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-04-04"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-04-05"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-04-06"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2024-03-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-04-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-04-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-04-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-04-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-04-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-04-06"><span class="fc-day-number">6</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style=""><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-04-07"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-04-08"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-04-09"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-04-10"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-04-11"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-04-12"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-04-13"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-04-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-04-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-04-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-04-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-04-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-04-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-04-13"><span class="fc-day-number">13</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style=""><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-04-14"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-04-15"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-04-16"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-04-17"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-04-18"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-04-19"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-04-20"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-04-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-04-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-04-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-04-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-04-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-04-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-04-20"><span class="fc-day-number">20</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style=""><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-04-21"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-04-22"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-04-23"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-04-24"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-04-25"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-04-26"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-04-27"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-04-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-04-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-04-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-04-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-04-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-04-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-04-27"><span class="fc-day-number">27</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style=""><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-04-28"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-04-29"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-04-30"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2024-05-01"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2024-05-02"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2024-05-03"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2024-05-04"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-04-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-04-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-04-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2024-05-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2024-05-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2024-05-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-05-04"><span class="fc-day-number">4</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style=""><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2024-05-05"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2024-05-06"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2024-05-07"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2024-05-08"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2024-05-09"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2024-05-10"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2024-05-11"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2024-05-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2024-05-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2024-05-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2024-05-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2024-05-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2024-05-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-05-11"><span class="fc-day-number">11</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
@endsection
<script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.2.0/main.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/uuid@8.3.2/dist/umd/uuidv4.min.js'></script>
</script>