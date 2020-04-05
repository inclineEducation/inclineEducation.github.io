'use strict';

const e = React.createElement;


function reactFooter(props){
    return(
        <footer class="site-footer" role="contentinfo" style="padding: 1em; padding-top: 7em;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h3 class="mb-4">About Incline Education</h3>
          <p class="mb-5">We are a team of university students from various faculties who have come together for the 
		  sole purpose of helping students achieve more out of their university experience and beyond. </p>
          <ul class="list-unstyled footer-link d-flex footer-social">
            <li><a href="https://linkedin.com/company/inclineeducation/" class="p-2"><span class="fa fa-linkedin"></span></a></li>
            <li><a href="https://www.instagram.com/incline_education/" class="p-2"><span class="fa fa-instagram"></span></a></li>
			<li><a href="https://www.facebook.com/incline.education/" class="p-2"><span class="fa fa-facebook"></span></a></li>
          </ul>

        </div>

        
        <div class="col-md-5 mb-3 pl-md-5">
          <div class="mb-5">
            <h3 class="mb-4">Contact Info</h3>
            <ul class="list-unstyled footer-link quick-contact">
              <li class="d-block">
                <span class="d-block caption">Email:</span><span class="caption-text">contact@inclineedu.org</span>
              </li>
            </ul>
          </div>

          
        </div>
        <div class="col-md-3 mb-3">
          <h3 class="mb-4">Quick Links</h3>
          <ul class="list-unstyled footer-link">
            <li><a href="terms.html">Terms of Use</a></li>
			<li><a href="privacy.html">Privacy Policy</a></li>
            <li><a href="mailto:contact@inclineedu.org">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-3">

        </div>
      </div>
    </div>
  </footer>
    )
}

ReactDOM.render(<reactFooter />, document.getElementById("react_footer"))