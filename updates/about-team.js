/*
LIST OF ALL MEMBERS HERE:

    Each member has NAME <string>

    Each member has PICTURE URL <string>

    Each member has DESCRIPTION <string>

LIST OF ALL TESTIMONIALS HERE:

    Testimonial has NAME

    Testimonial has DESCRIPTION

*/ 


// MEMBER 1
const NAME_1 = "Christopher Ng"
const DESCRIPTION_1 = "Christopher is a second year student pursuing a Bachelor of Science in Pharmacology and Minor in Commerce. He has previously interned in Deloitte Consulting and is currently working on publishing 2 papers in medical research. Outside of the classroom, Christopher can be found playing squash, running or enjoying the outdoors."
const IMAGE_URL_1 = "images/chris.png"
// ---



// MEMBER 2
const NAME_2 = "Jack He"
const DESCRIPTION_2 = "Jack is a first year student at UBC pursuing a Bachelor of Science in Computer Science and a Minor in Commerce. He will be interning at Microsoft as a software engineer and product manager this summer. Jack is currently working on his YouTube channel and will be posting about his journey to launching a Silicon Valley startup in the future. Jack enjoys playing chess and watching anime."
const IMAGE_URL_2 = "images/jack.jpg"
// ---


// MEMBER 3
const NAME_3 = "Talisha Griesbach"
const DESCRIPTION_3 = "Talisha is in her second year of Integrated Engineering in UBC. She designs Printed Circuit Boards with UBC Supermileage, serves as Director of Communications in Alpha Gamma Delta, works as a Collegia Advisor, and started her own social enterprise, Patch. Talisha is looking forward to balancing her summer co-op with Kardium while exercising and playing cello."
const IMAGE_URL_3 = "images/Talisha_edited.jpg"
// ---


// MEMBER 4
const NAME_4 = "Michelle Lin"
const DESCRIPTION_4 = "Michelle is a 2nd year Biomedical Engineering Student at UBC. She previously served as the First Year Council President at UBC Engineering. She has been an ambassador of Engineering Stories underneath the Dean’s Office and has also started her own fundraising initiative that funds elementary schools. Outside of school, her passions are playing Tennis and Film making."
const IMAGE_URL_4 = "images/Michelle.jpg"
// ---


// MEMBER 5
const NAME_5 = "Matheson Parmar"
const DESCRIPTION_5 = "Matheson is a second year student pursuing a Bachelor of Commerce in Accounting and Finance. He is currently working on a startup and has written articles on the consumer-goods market. Outside of work and the classroom, Matheson can be found running, solving cases, or self-teaching piano."
const IMAGE_URL_5 = "images/matheson.jpg"
// ---


// MEMBER 6
const NAME_6 = "Anushka Gupta"
const DESCRIPTION_6 = "Anushka is a second-year student in the Bachelor of International Economics Program. She is the founder of a non-profit called Aan which works with the government of India to conduct campaigns about child sexual abuse. She worked as a Research and Data Analysis Assistant at the Vancouver School of Economics Career Center and hopes to work in the field of developmental economics in the public sector."
const IMAGE_URL_6 = "images/Anushka.jpg"
// ---



// MEMBER 7
const NAME_7 = "DANILO ANGULO-MOLINA"
const DESCRIPTION_7 = "Danilo is a second-year student pursuing a Bachelor of Arts in International Relations and Political Sciences. He has previously been a youth ambassador of Colombia to multiple countries. He is the director and host of Let's Talk About, an initiative that gives a voice to students. Outside of school, Danilo can be found watching sunsets, practicing languages and swimming."
const IMAGE_URL_7 = "images/danilo.jpg"
// ---



// MEMBER 8
const NAME_8 = "ANDY CHUNG"
const DESCRIPTION_8 = "Andy is a second year student pursuing a Bachelor of Applied Sciences in Mechanical Engineering with a Thermofluids specialization. He has previously partnered with Telus during his internship with Legacy Fire Protection and is currently the Engine Head of Design at Formula UBC Racing. Outside of academics, Andy enjoys playing the guitar, practicing karate, and participating in motorsports."
const IMAGE_URL_8 = "images/andy.jpg"
// ---



function Member(props) {
    return (
            <div className="col-lg-4" data-aos="fade-up" data-aos-delay={props.delay}>
            <div className="media d-block media-custom text-center">
              <a href="#"><img src={props.img} alt="Image Placeholder" className="img-fluid"></img></a>
              <div class="media-body">
                <h3 class="mt-0 text-black">{props.name}</h3>
                <p>{props.description}</p>
              </div>
            </div>
          </div>
    )
}


class Team extends React.Component {
    render() {
        return (
            <div className = "row">
                <Member name = {NAME_1} description = {DESCRIPTION_1} img = {IMAGE_URL_1} delay = {100} />
                <Member name = {NAME_2} description = {DESCRIPTION_2} img = {IMAGE_URL_2} delay = {200} />
                <Member name = {NAME_3} description = {DESCRIPTION_3} img = {IMAGE_URL_3} delay = {300} />
                <Member name = {NAME_4} description = {DESCRIPTION_4} img = {IMAGE_URL_4} delay = {100} />
                <Member name = {NAME_5} description = {DESCRIPTION_5} img = {IMAGE_URL_5} delay = {200} />
                <Member name = {NAME_6} description = {DESCRIPTION_6} img = {IMAGE_URL_6} delay = {300} />
                <Member name = {NAME_7} description = {DESCRIPTION_7} img = {IMAGE_URL_7} delay = {100} />
                <Member name = {NAME_8} description = {DESCRIPTION_8} img = {IMAGE_URL_8} delay = {200} />
            </div>
        )
    }
}


ReactDOM.render(<Team />, document.getElementById("team"))