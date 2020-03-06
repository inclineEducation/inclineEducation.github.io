/*
LIST ALL TESTIMONIALS HERE:

    Testimonial has NAME

    Testimonial has DESCRIPTION

    We use an object to represent a testimonial here. 
*/


const testimonials = [
    {
        name: "Chris Ng",
        status:"Founder",
        description: "I learned a lot! This is some Testimonial! blah blah blah blah blah",
        imgUrl:"images/person_1.jpg"
    }, {
        name: "Tiffany Anderson",
        status: "Templeton Secondary Teacher",
        imgUrl:"images/chris.png",
        description: "Chris and his colleagues were professional, fun, and very informative. My students thoroughly enjoyed their visit!"
    }
]


function Testimonials(props) {
    return (
        <div>
            {props.listOfTestimonials.map((testimonial) => {
                return (
                    <div className="item">
                        <div className="block-33 h-100">
                            <div className="vcard d-flex mb-3">
                            <div className="image align-self-center"><img src={testimonial.imgUrl} alt="Person here"></img></div>
                            <div className="name-text align-self-center">
                                <h2 className="heading">{testimonial.name}</h2>
                                <span className="meta">{testimonial.status}</span>
                            </div>
                            </div>
                            <div className="text">
                            <blockquote>
                                <p>&ldquo; {testimonial.description} &ldquo;</p>
                            </blockquote>
                            </div>
                        </div>
                        <br></br>
                        <br></br>
                        <br></br>
                    </div>
                )
            })}
        </div>
    )
}


function Container() {
    return (
        <div className="section bg-light block-11">

            <div className="container">
                <div className="row justify-content-center mb-5">
                    <div className="col-md-8 text-center">
                        <h2 className="mb-4 section-title">Testimonials</h2>
                    </div>
                </div>
                <div className="nonloop-block-11">
                        <Testimonials listOfTestimonials = {testimonials}/>
                </div>
            </div>
        </div>
    )
}

function Test() {
    return (
        <div className="item">
          <div className="block-33 h-100">
            <div className="vcard d-flex mb-3">
              <div className="image align-self-center"><img src="images/person_2.jpg" alt="Person here"></img></div>
              <div className="name-text align-self-center">
                <h2 className="heading">John Smith</h2>
                <span className="meta">Customer Corp.</span>
              </div>
            </div>
            <div className="text">
              <blockquote>
                <p>&rdquo; Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, accusamus? Porro fugit culpa
                  consequuntur dolorum. &ldquo;</p>
              </blockquote>
            </div>
          </div>
        </div>
    )
}

ReactDOM.render(<Container />, document.getElementById("Testimonials"));