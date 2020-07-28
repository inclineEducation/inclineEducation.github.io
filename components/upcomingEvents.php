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
<div class="section" style="padding-bottom: 0em;">
    <div data-aos="fade" data-aos-delay="100" class="container-fluid">
        <h2 style="text-align: center;">Upcoming Events</h2>
<?php
    echo <<<TEXT
            <div class="row mb-5 no-gutters justify-content-center">
                <div class="col-sm-4 col-md-4 col-lg-4" style = "float: left;">
                <a href=/signup class="work-thumb">
                    <div class="work-text">
                        <h2>VIRTUAL PANEL</h2>
                        <p>Google Meet</p>
                        <p>Sunday, August 9</p>
                        <p>3:00pm - 4:30pm</p>
                    </div>
                    <img src=/images/event/vln11032020/25/vln6.jpg alt="Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover"></img>
                </a>
                </div>
            </div>
    TEXT;
?>
    </div>
</div>