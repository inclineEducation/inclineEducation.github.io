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
    },
	{
        name: "Daniel Wang",
        status: "Incline Education Mentee",
        imgUrl:"images/Daniel_Wang.jpg",
        description: "Prospective university freshmen like me often have too many questions and are usually confused about the process of \
		transitioning from high school to university life. IE Mentorship was able to tailor to my needs and quickly match a requested mentor \
		that has similar interests, backgrounds, and career interests as me. As a completely free service made by students for students, \
		IE Mentorship is a valuable platform to help you out and make friends that would benefit you long afterwards!"
    }
]

/*
function Testimonials(props) {
    return (
        <>
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
                                <p>&ldquo;{testimonial.description}&rdquo;</p>
                            </blockquote>
                            </div>
                        </div>
                        <br></br>
                        <br></br>
                        <br></br>
                    </div>
                )
            })}
        </>
    )
}
*/

class Container extends React.Component {
	render(){
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
	
	static Testimonials(props) {
    return (
        <>
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
                                <p>&ldquo;{testimonial.description}&rdquo;</p>
                            </blockquote>
                            </div>
                        </div>
                        <br></br>
                        <br></br>
                        <br></br>
                    </div>
                )
            })}
        </>
    )
}
	
}


ReactDOM.render(<Container />, document.getElementById("Testimonials"));