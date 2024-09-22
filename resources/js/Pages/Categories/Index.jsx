import React from "react";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/react";

const Index = (props) => {
    console.log(props);
    const { categories, flash } = props;

    const handleDetele = (id) => {
        if (confirm("Are you sure you want to delete this category?")) {
            Inertia.delete(`/categories/${id}`, {
                onSuccess: () => {
                    alert("Category deleted successfully");
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
            <h1>Category List</h1>
            <Link href="/categories/create" className="btn btn-primary">
                Create Category
            </Link>
            <table className="table mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {categories.map((category) => (
                        <tr key={category.id}>
                            <td>{category.name}</td>
                            <td>
                                <Link
                                    href={`/categories/${category.id}/edit`}
                                    className="btn btn-info mr-2"
                                >
                                    Edit
                                </Link>

                                {/* Form Action Using CSRF Token */}
                                {/* <form
                                    action={`/categories/${product.id}`}
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
                                    onClick={() => handleDetele(category.id)}
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
