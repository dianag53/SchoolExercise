$(document).ready(() => {

    $('#shopBtn').on('click', () => {
        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/photos',
            type: 'GET',
            success: (data) => {
                console.log(data);
                $('#main').html(data.map(entry => {
                    return `<div class="container">`
                            + `<div class="row">`
                                + `<div class="col-lg-12 text-center">`
                                    + `<h4 class="text-center">` + entry.title + `</h4>`
                                    + `<article class="text-center">`
                                            // + `<p>` + entry.body + `</p>`
                                            + '<img src="' + entry.url + '" class="img-fluid" />'
                                    + `</article>`
                                + `</div>`
                            + `</div>`
                        + `</div>`
                }))
            }
        })
    });

    $('#exampleFormControlSelect1').on('click', () => {
        $.ajax({
            url: 'grundelemente.php',
            type: 'GET',
            success: (data) => {

                const vehicles = Object.values(JSON.parse(data));
                console.log(vehicles);

                $('#exampleFormControlSelect1').html(vehicles.map((vehicle) => {
                    return `<option value="` + vehicle.name + `">` + vehicle.name + ` (` + vehicle.type +`)</option>`
                }))
            }
        })
    })
});