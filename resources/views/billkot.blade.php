@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row content-justify-center">
            <div class="invoice-box">
                    <table cellpadding="0" cellspacing="0">
                        <tr class="top">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td class="title">
                                          <h1>KOT INVOICE</h1>
                                        </td>
                                        
                                        <td>
                                            <b>Table No #:21</b><br>
                                            Order No #: 123<br>
                                            Created: January 1, 2015<br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="information">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td>
                                            For:<br>
                                            <b>Chancellor Grand.</b><br>
                                            <br>
                                        </td>
                                        
                                        <td>
                                            <b>{{ucwords($detailcustomer[0]->name)}}</b><br>
                                            +91-{{$detailcustomer[0]->mobileno}}<br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <tr class="heading">
                            <td>
                                Item
                            </td>
                            <td>
                                    Qnty.
                            </td>
                            <td>
                                Price
                            </td>
                        </tr>
                        @foreach ($detailbill as $item)
                        <tr class="item">
                            <td>
                                {{$item->itemname}}
                            </td>
                            <td>
                                    {{$item->itemqnty}}
                                </td>
                            <td>
                                    {{$item->amount}}
                            </td>
                        </tr>
                        @endforeach
                        <tr class="heading">
                                <td>
                                    Total
                                </td>
                                <td>

                                </td>
                                <td>
                                    {{$sum}}
                                
                                </td>
                            </tr>
                            <tr class="item last">
                                    <td>
                                        CGST(2.5%)
                                    </td>
                                    <td>
                                    
                                </td>
                                    <td>
                                        $10.00
                                    </td>
                                </tr>
                                <tr class="item last">
                                        <td>
                                            SGST(2.5%)
                                        </td>
                                        <td>
                                    
                                        </td>
                                        <td>
                                            $10.00
                                        </td>
                                    </tr>
                                    <tr class="heading">
                                            <td>
                                                Grand Total
                                            </td>
                                            <td>
                                    
                                                </td>
                                            <td>
                                                Price
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="" @click.prevent="printme" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                                    </div>
    
                <un-done></un-done>
            </div>
</div>
@endsection