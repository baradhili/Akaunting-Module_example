<head>
    @stack('head_start')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8; charset=ISO-8859-1"/>

    <title>@yield('title') - @setting('general.company_name')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous" media='all'>

    <!-- Custom styles for this template -->
    <link href="http://yubaba/public/css/grid.css?v=1.3.17a" rel="stylesheet">
    <!-- <link rel="stylesheet" href="http://yubaba/public/css/invoice.css?v=1.3.17">-->
    <style type="text/css">
        * {
            font-family: Helvetica Neue,tex_gyre_herosregular,Helvetica,Arial,sans-serif;
        }
        @media print {
			@page {
				size: A4 portrait;
				margin: 14mm;
			}
			.container {
				width: 1024px;
			}
			.text-primary {
				color: #2d73b5 !important;
			}
			.footer {
				position: absolute;
				bottom: 0;
				width: 100%;
				height: 300px;
			}
		}
    </style>


    @stack('css')

    @stack('stylesheet')

    @stack('js')

    @stack('scripts')

    @stack('head_end')
</head>
