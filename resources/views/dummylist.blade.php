@if(session()->has('success'))
                        <p class="alert alert-success">
                            {{session()->get('success')}}
                        </p>
                    @endif
                    
                        <table class="table table-dark table-bordered mt-3">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Asset Image</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Asset ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Purchased Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Serial NO</th>
                                
                                
                              </tr>
                            </thead>
                            
                          </table> 