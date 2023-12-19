function sendMail() {
    var params = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        course_name: document.getElementById("course_name").value,
        course_cost: document.getElementById("course_cost").value,
        phone: document.getElementById("phone").value,
        address: document.getElementById("address").value,
        instance: document.getElementById("instance").value,
    }

    emailjs
        .send("service_sjy2zy9", "template_hlpn6aq", params)
        .then(
            res => {
                document.getElementById("name").value = "";
                document.getElementById("course_name").value = "";
                document.getElementById("course_cost").value = "";
                document.getElementById("email").value = "";
                console.log(res);
            })
        .catch((err) => console.log(err));

    emailjs
        .send("service_sjy2zy9", "template_aesiunp", params)
        .then(
            res => {
                document.getElementById("name").value = "";
                document.getElementById("course_name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("address").value = "";
                document.getElementById("instance").value = "";
                document.getElementById("phone").value = "";
                console.log(res);
            })
        .catch((err) => console.log(err));
}
