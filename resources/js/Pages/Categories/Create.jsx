import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-react";

const Create = (props) => {
    const { data, setData, post, errors } = useForm({
        name: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/categories");
    };

    return (
        <div className="px-36 py-36">
            <h1 className="text-2xl font-bold">Create Category</h1>
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

                <button type="submit" className="btn btn-primary mt-8">
                    Save
                </button>
            </form>
        </div>
    );
};

export default Create;
