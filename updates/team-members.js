/*
LIST OF ALL MEMBERS HERE:

    Each member has NAME <string>

    Each member has PICTURE URL <string>

    Each member has DESCRIPTION <string>

*/ 


// MEMBER 1
const NAME_1 = "Christopher Ng"
const DESCRIPTION_1 = "Christopher is a third year undergraduate student pursuing a Bachelor of Science in Pharmacology \
and Minor in Commerce. He has previously interned at Deloitte Consulting  \
and is an author of two peer-reviewed publications in medical research. \
In his free time, Christopher enjoys playing squash, running or reading books on social psychology."
const IMAGE_URL_1 = "/images/team/300_80/chris3.png"
const PERSONAL_PAGE_1 = "https://www.linkedin.com/in/chrng/"
// ---



// MEMBER 2
const NAME_2 = "Jack He"
const DESCRIPTION_2 = "Jack is a second year student at UBC pursuing a Bachelor of Science in Computer Science and \
a Minor in Commerce. He is currently interning at Microsoft as a software engineer and product manager. \
He is also working on his YouTube channel and will be posting about his journey to launching \
a Silicon Valley startup in the future. Outside the classroom, Jack can be found playing chess."
const IMAGE_URL_2 = "/images/team/300_80/amazingJack4.jpg"
const PERSONAL_PAGE_2 = "https://www.linkedin.com/in/jack-he-845587161/"
// ---


// MEMBER 3
const NAME_3 = "Talisha Griesbach"
const DESCRIPTION_3 = "Talisha is in her third year of Integrated Engineering with a Minor in Commerce in UBC, \
and the recipient of the 2020 CEMF Women in Engineering Ambassador Award for BC. She is an Electrical Lead at \
UBC Supermileage, serves as Director of Communications in Alpha Gamma Delta, and started her own social \
enterprise, Patch. Talisha is currently interning at Kardium and loves exercising and playing cello."
const IMAGE_URL_3 = "/images/team/300_80/Talisha.jpg"
const PERSONAL_PAGE_3 = "https://www.linkedin.com/in/talishag/"
// ---


// MEMBER 4
const NAME_4 = "Michelle Lin"
const DESCRIPTION_4 = "Michelle is a third year Biomedical Engineering student at UBC. She previously \
served as the First Year Council President at UBC Engineering. She has been an ambassador of Engineering \
Stories underneath the Dean’s Office and has also started her own fundraising initiative that funds \
elementary schools. Outside of school, her passions are playing Tennis and Film making."
const IMAGE_URL_4 = "/images/team/300_80/Michelle.jpg"
const PERSONAL_PAGE_4 = "#"
// ---


// MEMBER 5
const NAME_5 = "Matheson Parmar"
const DESCRIPTION_5 = "Matheson is a third year student pursuing a Bachelor of Commerce in Accounting \
and Finance. He has previously written articles on the consumer goods market and offered pro-bono \
consulting services to local businesses. Matheson is currently interning at RBC Wealth Management in Toronto. \
Outside of work and the classroom, he can be found running, following the NBA, or \
teaching himself piano."
const IMAGE_URL_5 = "/images/team/300_80/matheson.jpg"
const PERSONAL_PAGE_5 = "https://www.linkedin.com/in/matheson-parmar-6a840b168/"
// ---


// MEMBER 6
const NAME_6 = "Anushka Gupta"
const DESCRIPTION_6 = "Anushka is a third year student in the Bachelor of International Economics Program. \
She is the founder of a non-profit called Aan which works with the government of India to conduct campaigns \
about child sexual abuse. She is working as a Research Assistant at Vancouver School of Economics and hopes \
to work in the field of developmental economics in the public sector."
const IMAGE_URL_6 = "/images/team/300_80/Anushka.jpg"
const PERSONAL_PAGE_6 = "https://www.linkedin.com/in/anushkagupta221/"
// ---



// MEMBER 7
const NAME_7 = "Danilo Angulo-Molina"
const DESCRIPTION_7 = "Danilo is a third year student pursuing a Bachelor of Arts in International \
Relations and Political Sciences. He has previously been a youth ambassador of Colombia to multiple \
countries. He is the director and host of Let's Talk About, an initiative that gives a voice to students. \
Outside of school, Danilo can be found watching sunsets, practicing languages and swimming."
const IMAGE_URL_7 = "/images/team/300_80/danilo.jpg"
const PERSONAL_PAGE_7 = "https://www.linkedin.com/in/danilo-angulo-molina-8434a3123/"
// ---



// MEMBER 8
const NAME_8 = "Andy Chung"
const DESCRIPTION_8 = "Andy is a third year student pursuing a Bachelor of Applied Sciences in Mechanical \
Engineering with a Thermofluids specialization. He is currently interning at Legacy Fire Protection \
and is the Engine Head of Design and Test Driver at Formula UBC. \
Outside of academics, Andy enjoys playing the guitar, practicing karate, and participating in motorsports."
const IMAGE_URL_8 = "/images/team/300_80/andy.jpg"
const PERSONAL_PAGE_8 = "https://www.linkedin.com/in/akchung168/"
// ---

// MEMBER 9
const NAME_9 = "Roy Du"
const DESCRIPTION_9 = "Roy is a third year student pursuing a Bachelor of Applied Sciences in Computer \
Engineering at UBC. He is a hardware and software developer on the UBC Supermileage team, and \
served as the 2nd year Computer Engineering Representative for the ECESS. Outside of school, Roy is an \
avid snowboarder, and is frequently found on Reddit for extended durations of time."
const IMAGE_URL_9 = "/images/team/300_80/Roy.jpg"
const PERSONAL_PAGE_9 = "https://www.linkedin.com/in/roydu/"
// ---

// MEMBER 10
const NAME_10 = "Varun Nair"
const DESCRIPTION_10 = "Varun is a third year student majoring in Integrated Sciences, integrating Genetics \
and Global Health. He is passionately immersed in the UBC community through various organizations, including \
Wellness Peers and the Integrated Sciences Students Association. Varun is also involved with clinical research \
at BC Children’s Hospital, where he will be leading his own research project this fall. In his free time, Varun \
enjoys watching sports and taking long walks."
const IMAGE_URL_10 = "/images/team/300_80/Varun.jpg"
const PERSONAL_PAGE_10 = "https://www.linkedin.com/in/varun-nair/"
// ---

// MEMBER 11
const NAME_11 = "Nusair Islam"
const DESCRIPTION_11 = "Nusair is a third year student pursuing a Bachelor of Applied Sciences in Electrical \
Engineering. He is currently interning at Rocsol Tech and is a member of the structure sub-team in UBC Orbit. \
Outside of school, Nusair is enthusiastic about bodybuilding, playing the guitar, and going on hikes."
const IMAGE_URL_11 = "/images/team/300_80/nusair.jpg"
const PERSONAL_PAGE_11 = "https://www.linkedin.com/in/nusair-islam-339a39198/"
// ---

function Member(props) {
    return (
            <div className="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay={props.delay} style={{marginLeft: "auto", marginRight: "auto"}}>
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
                <Member name = {NAME_11} description = {DESCRIPTION_11} img = {IMAGE_URL_11} website = {PERSONAL_PAGE_11} delay = {100} />
            </div>
        )
    }
}

/*
ReactDOM.render(<Team />, document.getElementById("team"))
*/