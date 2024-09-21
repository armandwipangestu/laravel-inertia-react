import React from "react";
import { Inertia } from "@inertiajs/inertia";
import { InertiaLink } from "@inertiajs/inertia-react";

const Index = (props) => {
    console.log(props);
    const { products, flash } = props;

    const handleDetele = (id) => {
        if (confirm("Are you sure you want to delete this product?")) {
            Inertia.delete(`/products/${id}`, {
                onSuccess: () => {
                    alert("Product deleted successfully");
                },
            });
        }
    };

    return (
        <div className="px-36 py-36">
            {flash.message && (
                <div className="alert alert-success shadow-lg mb-4">
                    <div>
                        <span>{flash.message}</span>
                    </div>
                </div>
            )}
            <h1>Product List</h1>
            <InertiaLink href="/products/create" className="btn btn-primary">
                Create Product
            </InertiaLink>
            <table className="table mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {products.map((product) => (
                        <tr key={product.id}>
                            <td>{product.name}</td>
                            <td>{product.price}</td>
                            <td>
                                <InertiaLink
                                    href={`/products/${product.id}/edit`}
                                    className="btn btn-info mr-2"
                                >
                                    Edit
                                </InertiaLink>

                                {/* Form Action Using CSRF Token */}
                                {/* <form
                                    action={`/products/${product.id}`}
                                    method="POST"
                                    style={{ display: "inline-block" }}
                                >
                                    <input
                                        type="hidden"
                                        name="_method"
                                        value="DELETE"
                                    />
                                    <input
                                        type="hidden"
                                        name="_token"
                                        value={document
                                            .querySelector(
                                                'meta[name="csrf-token"]'
                                            )
                                            .getAttribute("content")}
                                    />
                                    <button
                                        type="submit"
                                        className="btn btn-danger"
                                    >
                                        Delete
                                    </button>
                                </form> */}

                                {/* Action using Inertia Delete Method */}
                                <button
                                    onClick={() => handleDetele(product.id)}
                                    className="btn btn-error"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default Index;
