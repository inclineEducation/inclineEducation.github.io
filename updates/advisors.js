/*
LIST OF ALL MEMBERS HERE:

    Each member has NAME <string>

    Each member has PICTURE URL <string>

    Each member has DESCRIPTION <string>

*/ 


// MEMBER 1
const ADVISOR_NAME_1 = "Natalia Lumen"
const ADVISOR_DESCRIPTION_1 = "Natalia is a Founder and CEO of ThyForLife, a HealthTech mobile app platform enabling thyroid patients \
to improve their health outcomes. She has previously worked at Bain & Company, the World Bank and the European Bank for Reconstruction \
and Development. Natalia holds an MBA from the Tuck School of Business at Dartmouth College. Outside of work, she enjoys abstract painting, \
playing drums, learning improvisation theatre and relaxing with yoga. "
const ADVISOR_IMAGE_URL_1 = "/images/advisors/300_80/natalia.jpg"
const ADVISOR_PERSONAL_PAGE_1 = "https://www.linkedin.com/in/natalialumen/"
// ---

/*function Member(props) {
    return (
            <div className="col-lg-4" data-aos="fade-up" data-aos-delay={props.delay} style={{marginLeft: "auto", marginRight: "auto"}}>
            <div className="media d-block text-center">
              <div className="media-custom">
              <a href={props.website} target = "_blank"><img src={props.img} alt={props.name} className="img-fluid"></img></a>
              </div>
              <div class="media-body">
                <h3 class="mt-0 text-black">{props.name}</h3>
                <p>{props.description}</p>
              </div>
            </div>
          </div>
    )
}*/


class Advisors extends React.Component {
    render() {
        return (
            <div className = "row">
                <Member name = {ADVISOR_NAME_1} description = {ADVISOR_DESCRIPTION_1} img = {ADVISOR_IMAGE_URL_1} website = {ADVISOR_PERSONAL_PAGE_1} delay = {100} />
            </div>
        )
    }
}


ReactDOM.render(<Advisors />, document.getElementById("advisor_list"))