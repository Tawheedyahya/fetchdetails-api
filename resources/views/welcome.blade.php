<!DOCTYPE html>
<html>

<head>
    <title>User Info from API</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">User Information</h1>
            <input type="text" id="searchbar" class="form-control w-25" placeholder="Search">
        </div>

        <br>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($res_value as $user)
                    <tr>
                        <td class="name">{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['address'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#searchbar').on('keyup', function() {
                let val = $(this).val().toLowerCase();

                $('tbody tr').each(function() {
                    let name = $(this).find('.name').text().toLowerCase();
                    if (name.includes(val)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            $('#searchbar').on('blur', function() {
                $(this).val('');
                $('tbody tr').show();
            });

        });
    </script>
</body>

</html>
