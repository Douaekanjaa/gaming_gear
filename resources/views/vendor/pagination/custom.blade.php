<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            .pagination {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }

            .pagination .page-item {
                margin: 0 5px;
            }

            .pagination .page-link {
                color: #fff;
                background-color: #a634db;
                border: 1px solid #8525b1;
                padding: 8px 16px; 
                border-radius: 5px; 
                transition: background-color 0.3s ease-in-out;
            }

            .pagination .page-link:hover {
                background-color: #a634dbc0;
                border: 1px solid #a634dbc0;
            }

    </style>
</head>
<body>
    @if($paginator->hasPages())
   <ul class="pagination">
            @if($paginator->onFirstPage())
                       <li class="page-item disabled "><span class="page-link">Previous</span></li>
                           @else

                           <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}">Previous</a></li>
            @endif

            <!-- Boucler sur les pages  !>
                                            @foreach($elements as $element)
                                                         <-- cas d'une seule page -->
                                                                  @if(is_string($element))
                                                                              <li class="page-item disabled "><span class="page-link">{{$element}}</span></li>
                                                                  @endif

                                                                  <!-- cas de plusieurs pages -->
                                                                    @if(is_array($element))
                                                                                @foreach($element as $page=>$url)
                                                                                        @if($page==$paginator->currentPage())
                                                                                                 <li class="page-item active"> <span class="page-link" >{{$page}}</span></li>
                                                                                               @else
                                                                                                <li class="page-item"> <a class="page-link" href="{{$url}}">{{$page}}</a></li>
                                                                                        @endif
                                                                                 @endforeach
                                                                    @endif
                                             @endforeach
                                     @if($paginator->hasMorePages())

                                             <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">Next</a></li>
                                             @else
                                             <li class="page-item"><span class="page-link">Next</span></li>
                                    @endif
    </ul>
@endif

</body>
</html>