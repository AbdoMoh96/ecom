## Product API

This API allows you to retrieve and manage products.
<br>
This api is made using a native php mvc api

### Endpoints

- `GET /api/products/list`: Retrieve a list of all products.
- `GET /api/products/types/list`: Retrieve a list of all product types.
- `POST /api/products/new`: Create a new product.
- `DELETE /api/products/delete`: Delete one or more products.

### Examples

Retrieve a list of all products: `GET /api/products/list`

<pre>
[
    {
        "product_id": 1,
        "sku": "45454-45454-45454",
        "name": "the matrix",
        "price": "200.00",
        "type_id": 1,
        "type": "dvd",
        "size": 700,
        "weight": null,
        "height": null,
        "width": null,
        "length": null
    },
    {
        "product_id": 2,
        "sku": "2321-3212-9698",
        "name": "rich dad poor dad",
        "price": "25.00",
        "type_id": 2,
        "type": "book",
        "size": null,
        "weight": 300,
        "height": null,
        "width": null,
        "length": null
    }
]
</pre>

<br>
<br>

Retrieve a list of all product types: `GET /api/products/types/list`

<pre>
[
    {
        "id": 1,
        "name": "dvd"
    },
    {
        "id": 2,
        "name": "book"
    },
    {
        "id": 3,
        "name": "furniture"
    }
]
</pre>

<br>
<br>

create product: `POST /api/products/new`

<pre>
{
    "sku" : "2654-6541",
    "name" : "jone wick",
    "price" : 500,
    "type_id" : 1,
    "size" : 800,
    "weight" : null,
    "height" : null,
    "width" : null,
    "length" : null
}
</pre>

<br>
<br>

delete product or products: `DELETE /api/products/delete`

<pre>
{
    "product_ids" : [4]
}

// or for more than one product

{
    "product_ids" : [1,2,3]
}
</pre>