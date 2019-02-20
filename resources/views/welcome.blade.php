<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Please, fill the form</title>
        <link href="/css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="mt-5 justify-content-md-center">
                <form action="/api/save" method="POST">
                    <div class="card">
                        <div class="card-header">Please, fill the form</div>
                            <ul class="parent-container list-group list-group-flush">
                                <li class="list-group-item pb-0 leader-data">
                                    <div class="d-flex">
                                        <div class="p-2 w-75">
                                            <div class="form-group row">
                                                <label for="leader-name" class="col-sm-2 col-form-label">Your Name</label>
                                                <div class="col-sm-10 typeahead__container">
                                                    <div class="typeahead__container">
                                                        <div class="typeahead__field">
                                                            <div class="typeahead__query">
                                                                <input
                                                                        id="leader-name"
                                                                        required
                                                                        class="js-typeahead-user form-control"
                                                                        name="leader-name"
                                                                        type="search"
                                                                        placeholder="Name"
                                                                        autocomplete="off"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="leader-phone" class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input
                                                            id="leader-phone"
                                                            name="leader-phone"
                                                            class="form-control"
                                                            type="tel"
                                                            required
                                                            placeholder="Phone" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 flex-shrink-1 ml-auto"></div>
                                    </div>

                                </li>
                                <li class="list-group-item pb-0 guest-data">
                                    <div class="d-flex">
                                        <div class="p-2 w-75">
                                            <div class="form-group row">
                                                <label for="guest-names[]" class="col-sm-2 col-form-label">Guest Name</label>
                                                <div class="col-sm-10 typeahead__container">
                                                    <div class="typeahead__container">
                                                        <div class="typeahead__field">
                                                            <div class="typeahead__query">
                                                                <input
                                                                        class="js-typeahead-user guest-name form-control"
                                                                        name="guest-names[]"
                                                                        type="search"
                                                                        placeholder="Name"
                                                                        autocomplete="off"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="guest-phones[]" class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input
                                                            name="guest-phones[]"
                                                            class="form-control guest-phone phone-input"
                                                            type="tel"
                                                            placeholder="Phone" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 flex-shrink-1 ml-auto">
                                            <a href="#" class="remove-row text-decoration-none font-weight-bold h3">x</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <div class="card-body d-flex justify-content-end">
                            <button id="add-row" type="button" class="btn btn-success mr-0">Add row</button>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-end">
                            <button id="submit" type="submit" class="btn btn-primary mr-0">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="js/app.js"></script>
    </body>
</html>
