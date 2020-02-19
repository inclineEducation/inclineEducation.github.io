/*
    SIMPLY CHANGE THE TEXT INSIDE THE DIV TAG IN ORDER TO UPDATE THE SITE WITH NEW INFORMATION
*/


// CHANGE THE MAIN TITLE 
function UpdateTitle() {
    return (
        <div>
            Incline UR Education
        </div>
    )
}

// CHANGE THE SUB TITLE
function UpdateSubTitle() {
    return (
        <div>
            From Kindergarten to University
        </div>
    )
}

ReactDOM.render(<UpdateTitle />, document.getElementById("title"))
ReactDOM.render(<UpdateSubTitle />, document.getElementById("subtitle"))