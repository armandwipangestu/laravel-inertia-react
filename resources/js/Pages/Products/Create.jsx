import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-react";

const Create = () => {
    const { data, setData, post, errors } = useForm({
        name: "",
        price: "",
        description: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/products");
    };

    return (
        <div className="px-36 py-36">
            <h1 className="text-2xl font-bold">Create Product</h1>
            <form onSubmit={handleSubmit} className="flex gap-6">
                <label className="form-control w-full max-w-xs">
                    <div className="label">
                        <span className="label-text">Name</span>
                    </div>
                    <input
                        type="text"
                        placeholder="Name"
                        className="input input-bordered input-primary w-full max-w-xs"
                        value={data.name}
                        onChange={(e) => setData("name", e.target.value)}
                    />
                    {errors.name && <div>{errors.name}</div>}
                </label>
                <label className="form-control w-full max-w-xs">
                    <div className="label">
                        <span className="label-text">Price</span>
                    </div>
                    <input
                        type="text"
                        placeholder="Price"
                        className="input input-bordered input-primary w-full max-w-xs"
                        value={data.price}
                        onChange={(e) => setData("price", e.target.value)}
                    />
                    {errors.price && <div>{errors.price}</div>}
                </label>
                <label className="form-control w-full max-w-xs">
                    <div className="label">
                        <span className="label-text">Description</span>
                    </div>
                    <input
                        type="text"
                        placeholder="Description"
                        className="input input-bordered input-primary w-full max-w-xs"
                        value={data.description}
                        onChange={(e) => setData("description", e.target.value)}
                    />
                    {errors.description && <div>{errors.description}</div>}
                </label>

                <button type="submit" className="btn btn-primary mt-8">
                    Save
                </button>
            </form>
        </div>
    );
};

export default Create;
