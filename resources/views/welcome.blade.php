<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Please, fill the form</title>

        <!-- Fonts -->
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="mt-5 justify-content-md-center">
                <div class="card">
                    <div class="card-header">Please, fill the form</div>
                    <form>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10 typeahead__container">
                                            <div class="typeahead__container">
                                                <div class="typeahead__field">
                                                    <div class="typeahead__query">
                                                        <input
                                                                required
                                                                class="js-typeahead-user_v1"
                                                                name="name"
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
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input
                                                    name="phone"
                                                    class="form-control"
                                                    type="tel"
                                                    required
                                                    placeholder="Phone" />
                                        </div>
                                    </div>
                            </li>
                        </ul>
                    </form>
                    <div class="card-body d-flex justify-content-end">
                        <button id="add-row" type="button" class="btn btn-success mr-0">Add row</button>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-end">
                        <button id="submit" type="submit" class="btn btn-primary mr-0">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/app.js"></script>
    </body>
</html>
