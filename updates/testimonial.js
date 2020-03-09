/*
LIST ALL TESTIMONIALS HERE:

    Testimonial has NAME

    Testimonial has DESCRIPTION

    We use an object to represent a testimonial here. 
*/


const testimonials = [
    {
        name: "Tiffany Anderson",
        status: "Templeton Secondary Teacher",
        imgUrl:"images/Tiffany.jpg",
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


ReactDOM.render(<Container />, document.getElementById("Testimonials"));