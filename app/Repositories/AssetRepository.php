<?php

namespace App\Repositories;

use http\Env\Request;
use http\Env\Response;
use App\Models\AssetInfo;

class AssetRepository
{
    public function find($id)
    {
        $findasset=AssetInfo::find($id);
        return $findasset;
    }

    public function store($req)
    {
            $image_name=null;

                //checking if image exist in this request.

                 if($req->hasFile('product_image'))
                 {
                     //generating file name
                     $image_name=date('Ymdhis') .'.'. $req->file('product_image')->getClientOriginalExtension();

                     //storing into project directory

                     $req->file('product_image')->storeAs('/products',$image_name);
                 }


            $assetrepo=AssetInfo::create([
                  'asset_name'=>$req->asset_name, 
                  'cost'=>$req->cost,
                  'description'=>$req->description,
                  'category'=>$req->category, 
                  'image'=>$image_name
               ]);

               return $assetrepo;
    }

    public function update($findasset, $req)
    {
        $image_name=$findasset->image;

                //checking if image exist in this request.

                 if($req->hasFile('product_image'))
                 {
                     //generating file name
                     $image_name=date('Ymdhis') .'.'. $req->file('product_image')->getClientOriginalExtension();

                     //storing into project directory

                     $req->file('product_image')->storeAs('/products',$image_name);

                 }

                 $findasset->update([
                    'asset_name'=>$req->asset_name, 
                    'cost'=>$req->cost,
                    'description'=>$req->description,
                    'category'=>$req->category, 
                    'image'=>$image_name
                 ]);
    }
}