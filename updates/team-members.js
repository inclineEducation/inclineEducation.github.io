/*
LIST OF ALL MEMBERS HERE:

    Each member has NAME <string>

    Each member has PICTURE URL <string>

    Each member has DESCRIPTION <string>

*/ 


// MEMBER 1
const NAME_1 = "Christopher Ng"
const DESCRIPTION_1 = "Christopher is a second year student pursuing a Bachelor of Science in Pharmacology \
and Minor in Commerce. He has previously interned in Deloitte Consulting and is currently working on \
publishing 2 papers in medical research. Outside of the classroom, Christopher can be found playing \
squash, running or enjoying the outdoors."
const IMAGE_URL_1 = "images/team/300_80/chris2.jpg"
const PERSONAL_PAGE_1 = "https://www.linkedin.com/in/chrng/"
// ---



// MEMBER 2
const NAME_2 = "Jack He"
const DESCRIPTION_2 = "Jack is a first year student at UBC pursuing a Bsc major in Computer Science and \
a minor in Commerce. He will be interning at Microsoft as a software engineer and product manager this \
summer. Jack is currently working on his YouTube channel and will be posting about his journey to launching \
a Silicon Valley startup in the future. Outside the classroom, Jack can be found playing chess."
const IMAGE_URL_2 = "images/team/300_80/amazingJack4.jpg"
const PERSONAL_PAGE_2 = "https://www.linkedin.com/in/jack-he-845587161/"
// ---


// MEMBER 3
const NAME_3 = "Talisha Griesbach"
const DESCRIPTION_3 = "Talisha is in her second year of Integrated Engineering in UBC. She designs \
Printed Circuit Boards with UBC Supermileage, serves as Director of Communications in Alpha Gamma Delta, \
works as a Collegia Advisor, and started her own social enterprise, Patch. Talisha is looking forward to \
balancing her summer co-op with Kardium while exercising and playing cello."
const IMAGE_URL_3 = "images/team/300_80/Talisha_edited.jpg"
const PERSONAL_PAGE_3 = "https://www.linkedin.com/in/talishag/"
// ---


// MEMBER 4
const NAME_4 = "Michelle Lin"
const DESCRIPTION_4 = "Michelle is a second year Biomedical Engineering Student at UBC. She previously \
served as the First Year Council President at UBC Engineering. She has been an ambassador of Engineering \
Stories underneath the Dean’s Office and has also started her own fundraising initiative that funds \
elementary schools. Outside of school, her passions are playing Tennis and Film making."
const IMAGE_URL_4 = "images/team/300_80/Michelle.jpg"
const PERSONAL_PAGE_4 = "#"
// ---


// MEMBER 5
const NAME_5 = "Matheson Parmar"
const DESCRIPTION_5 = "Matheson is a second year student pursuing a Bachelor of Commerce in Accounting \
and Finance. He has previously written articles on the consumer goods market and offered pro-bono \
consulting services to local BC businesses. This summer, he will be interning at a fintech firm called \
Cinchy. Outside of work and the classroom, Matheson can be found running, following the NBA, or \
self-teaching piano."
const IMAGE_URL_5 = "images/team/300_80/matheson.jpg"
const PERSONAL_PAGE_5 = "https://www.linkedin.com/in/matheson-parmar-6a840b168/"
// ---


// MEMBER 6
const NAME_6 = "Anushka Gupta"
const DESCRIPTION_6 = "Anushka is a second year student in the Bachelor of International Economics \
Program. She is the founder of a non-profit called Aan which works with the government of India to \
conduct campaigns about child sexual abuse. She worked as a Research and Data Analysis Assistant at \
the Vancouver School of Economics Career Center and hopes to work in the field of developmental economics \
in the public sector."
const IMAGE_URL_6 = "images/team/300_80/Anushka.jpg"
const PERSONAL_PAGE_6 = "https://www.linkedin.com/in/anushkagupta221/"
// ---



// MEMBER 7
const NAME_7 = "Danilo Angulo-Molina"
const DESCRIPTION_7 = "Danilo is a second year student pursuing a Bachelor of Arts in International \
Relations and Political Sciences. He has previously been a youth ambassador of Colombia to multiple \
countries. He is the director and host of Let's Talk About, an initiative that gives a voice to students. \
Outside of school, Danilo can be found watching sunsets, practicing languages and swimming."
const IMAGE_URL_7 = "images/team/300_80/danilo.jpg"
const PERSONAL_PAGE_7 = "https://www.linkedin.com/in/danilo-angulo-molina-8434a3123/"
// ---



// MEMBER 8
const NAME_8 = "Andy Chung"
const DESCRIPTION_8 = "Andy is a second year student pursuing a Bachelor of Applied Sciences in Mechanical \
Engineering with a Thermofluids specialization. He has previously partnered with Telus during his \
internship with Legacy Fire Protection and is currently the Engine Head of Design at Formula UBC Racing. \
Outside of academics, Andy enjoys playing the guitar, practicing karate, and participating in motorsports."
const IMAGE_URL_8 = "images/team/300_80/andy.jpg"
const PERSONAL_PAGE_8 = "https://www.linkedin.com/in/akchung168/"
// ---

// MEMBER 9
const NAME_9 = "Roy Du"
const DESCRIPTION_9 = "Roy is a second year student pursuing a Bachelor of Applied Sciences in Computer \
Engineering at UBC. He is a hardware and software developer on the UBC Supermileage team, and is currently \
serving as the 2nd year Computer Engineering Representative for the ECESS. Outside of school, Roy is an \
avid snowboarder, and is frequently found on Reddit for extended durations of time."
const IMAGE_URL_9 = "images/team/300_80/Roy.jpg"
const PERSONAL_PAGE_9 = "https://www.linkedin.com/in/roydu/"
// ---

// MEMBER 10
const NAME_10 = "Varun Nair"
const DESCRIPTION_10 = "Varun is in his second year in Integrated Sciences. He is passionate about being \
involved in the UBC community through various organizations, including Wellness Peers and the Integrated \
Sciences Students Association. Varun also assists with clinical research at BC Children’s Hospital, where \
he will be leading his own projects this summer. Outside of school, Varun enjoys watching sports, like \
soccer and basketball, and keeping up with global current affairs."
const IMAGE_URL_10 = "images/team/300_80/Varun.jpg"
const PERSONAL_PAGE_10 = "https://www.linkedin.com/in/varun-nair/"
// ---

function Member(props) {
    return (
            <div className="col-lg-4" data-aos="fade-up" data-aos-delay={props.delay}>
            <div className="media d-block media-custom text-center">
              <a href={props.website} target = "_blank"><img src={props.img} alt={props.name} className="img-fluid"></img></a>
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
                <Member name = {NAME_1} description = {DESCRIPTION_1} img = {IMAGE_URL_1} website = {PERSONAL_PAGE_1} delay = {100} />
                <Member name = {NAME_2} description = {DESCRIPTION_2} img = {IMAGE_URL_2} website = {PERSONAL_PAGE_2} delay = {200} />
                <Member name = {NAME_3} description = {DESCRIPTION_3} img = {IMAGE_URL_3} website = {PERSONAL_PAGE_3} delay = {300} />
                <Member name = {NAME_4} description = {DESCRIPTION_4} img = {IMAGE_URL_4} website = {PERSONAL_PAGE_4} delay = {100} />
                <Member name = {NAME_5} description = {DESCRIPTION_5} img = {IMAGE_URL_5} website = {PERSONAL_PAGE_5} delay = {200} />
                <Member name = {NAME_6} description = {DESCRIPTION_6} img = {IMAGE_URL_6} website = {PERSONAL_PAGE_6} delay = {300} />
                <Member name = {NAME_7} description = {DESCRIPTION_7} img = {IMAGE_URL_7} website = {PERSONAL_PAGE_7} delay = {100} />
                <Member name = {NAME_8} description = {DESCRIPTION_8} img = {IMAGE_URL_8} website = {PERSONAL_PAGE_8} delay = {200} />
				<Member name = {NAME_9} description = {DESCRIPTION_9} img = {IMAGE_URL_9} website = {PERSONAL_PAGE_9} delay = {300} />
                <Member name = {NAME_10} description = {DESCRIPTION_10} img = {IMAGE_URL_10} website = {PERSONAL_PAGE_10} delay = {100} />
            </div>
        )
    }
}


ReactDOM.render(<Team />, document.getElementById("team"))