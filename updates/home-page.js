/*
    SIMPLY CHANGE THE TEXT INSIDE THE DIV TAG IN ORDER TO UPDATE THE SITE WITH NEW INFORMATION

    We update / add new events here. 
*/


const ALL_UPCOMING_EVENTS = [
    {
        "title":"Vancouver Learning Network Panel Discussion",
        "location":"John Oliver Secondary School, East 41st Avenue, Vancouver, BC",
        "date":"March 12, 2020",
        "time":"6:30pm - 8pm",
        "imageUrl":"images/highschool.jpg",
        "url":"contact.html"
    }
]


function Event(props) {
    return (
        <div className="col-sm-6 col-md-6 col-lg-6" data-aos="fade" data-aos-delay="100" style = {{float:"left"}}>
          <a href= {props.url} className="work-thumb">
            <div className="work-text">
              <h2>{props.title}</h2>
              <p>{props.location}</p>
              <p>{props.date}</p>
              <p>{props.time}</p>
            </div>
            <img src={props.imageUrl} alt="Image" className="img-fluid"></img>
          </a>
        </div>
    )
}
 
function ContainerForEvents(props) {
    return (
        <div>
            {props.listOfEvents.map((event) => {
                return (
                    <Event title = {event.title} location = {event.location} date = {event.date} time = {event.time} imageUrl = {event.imageUrl} url = {event.url} />
                )
            })}
        </div>
    )
}




// CHANGE THE MAIN TITLE 
function UpdateTitle() {
    return (
        <div>
            Incline Education
        </div>
    )
}
// CHANGE THE SUB TITLE
function UpdateSubTitle() {
    return (
        <div>
            Helping Students Find Lasting Success
        </div>
    )
}


ReactDOM.render(<UpdateTitle />, document.getElementById("title"))
ReactDOM.render(<UpdateSubTitle />, document.getElementById("subtitle"))
ReactDOM.render(<ContainerForEvents listOfEvents = {ALL_UPCOMING_EVENTS}/>, document.getElementById("events"))