<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Documentation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
        }
        h1 {
            margin-top: 0;
        }
        h2 {
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 5px;
            margin-top: 40px;
        }
        .endpoint {
            background: #f1f3f5;
            padding: 12px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .method {
            font-weight: bold;
            color: #0d6efd;
        }
        .url {
            font-family: monospace;
        }
        .desc {
            margin-top: 5px;
            color: #495057;
        }
        footer {
            margin-top: 40px;
            font-size: 13px;
            color: #868e96;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📘 API Documentation</h1>
    <p>Base URL:</p>
    <div class="endpoint">
        <span class="url">{{ url('/api') }}</span>
    </div>

    <!-- CUSTOMER -->
    <h2>👤 Customer</h2>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/customers</div>
        <div class="desc">Get all customers</div>
    </div>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/customers/{custId}</div>
        <div class="desc">Get customer by CustID</div>
    </div>

    <!-- CUSTOMER TTH -->
    <h2>📄 Customer TTH</h2>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/customer-tth</div>
        <div class="desc">Get all Customer TTH</div>
    </div>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/customer-tth/{id}</div>
        <div class="desc">Get TTH by ID</div>
    </div>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/customer-tth/by-customer/{custId}</div>
        <div class="desc">Get TTH by Customer</div>
    </div>

    <!-- CUSTOMER TTH DETAIL -->
    <h2>📦 Customer TTH Detail</h2>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/customer-tth-detail</div>
        <div class="desc">Get all TTH detail</div>
    </div>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/customer-tth-detail/{id}</div>
        <div class="desc">Get TTH detail by ID</div>
    </div>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/customer-tth-detail/by-tth/{tthNo}</div>
        <div class="desc">Get TTH detail by TTH No</div>
    </div>

    <!-- MOBILE CONFIG -->
    <h2>⚙️ Mobile Config</h2>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/mobile-config</div>
        <div class="desc">Get all mobile configs</div>
    </div>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/mobile-config/by-branch/{branchCode}</div>
        <div class="desc">Get config by branch</div>
    </div>

    <div class="endpoint">
        <div class="method">GET</div>
        <div class="url">/api/mobile-config/by-name/{name}</div>
        <div class="desc">Get config by name</div>
    </div>

    <footer>
        API Documentation • Laravel {{ app()->version() }}
    </footer>
</div>

</body>
</html>
