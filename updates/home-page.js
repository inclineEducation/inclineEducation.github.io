/*
    SIMPLY CHANGE THE TEXT INSIDE THE DIV TAG IN ORDER TO UPDATE THE SITE WITH NEW INFORMATION
*/


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
            We Help High School Students Succeed
        </div>
    )
}

ReactDOM.render(<UpdateTitle />, document.getElementById("title"))
ReactDOM.render(<UpdateSubTitle />, document.getElementById("subtitle"))