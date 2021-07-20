<style>
    .work-thumb .work-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 90%;
        margin-top: 20px;
        transition: 0.3s all ease;
        opacity: 1;
        visibility: visible;
        transform: translate(-50%, -50%);
    }
    .work-thumb .work-text h2 {
        color: #fff;
        font-weight: 300;
        margin-bottom: 0;
        font-size: 1.5rem;
    }
    .work-thumb .work-text p {
        color: rgba(255, 255, 255, .5);
    }
    .work-thumb:before {
        content: "";
        background: rgba(0, 0, 0, .5);
        position: absolute;
        transition: 0.3s all ease;
        opacity: 1;
        visibility: visible;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
    }
    .work-thumb:hover .work-text {
        margin-top: 0px;
        opacity: 1;
        visibility: visible;
    }
    .work-thumb:hover:before {
	 opacity: 1;
	 visibility: visible;
    }
</style>
<div class="section events upcomingEvents" style="padding-bottom: 0em;">
    <div data-aos="fade" data-aos-delay="100" class="container-fluid">
        <h2 style="text-align: center;">Upcoming Events</h2>
<?php
    echo <<<TEXT
            <div class="row mb-5 no-gutters justify-content-center">
                <div class="col-sm-3 col-md-3 col-lg-3 text-center" style = "float: left;">
                <a href=/events/summerstempanel2021 class="work-thumb">
                    <div class="work-text">
                        <h2>STEM VIRTUAL PANEL</h2>
                        <p>Youtube Live</p>
                        <p>Saturday, August 14</p>
                        <p>1pm PST / 2pm MST / 4pm EST</p>
                    </div>
                    <img src=/images/misc/backgrounds/alexandre-debieve-tech.jpg alt="Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover"></img>
                </a>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 text-center" style = "float: left;">
                <a href=/events/summerartspanel2021 class="work-thumb">
                    <div class="work-text">
                        <h2>BUSINESS + ARTS VIRTUAL PANEL</h2>
                        <p>Youtube Live</p>
                        <p>Sunday, August 15</p>
                        <p>1pm PST / 2pm MST / 4pm EST</p>
                    </div>
                    <img src=/images/misc/backgrounds/green-chameleon-arts.jpg alt="Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover"></img>
                </a>
                </div>
            </div>
    TEXT;
?>
    </div>
</div>
