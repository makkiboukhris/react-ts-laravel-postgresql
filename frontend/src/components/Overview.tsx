import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

type ArtEvent = {
  id: number;
  name: string;
  date: string;
  description: string | null;
};

const Overview: React.FC = () => {
  const [artEventList, setArtEventList] = useState<ArtEvent[]>([
    {
      id: 0,
      name: "-",
      date: "-",
      description: null,
    },
  ]);

  const [sortBy, setSortBy] = useState<string | null>(null);
  const [searchInput, setSearchInput] = useState<string | null>(null);
  const [renderTrigger, setRenderTrigger] = useState<boolean>(false);

  const handleSort = async () => {
    try {
      const response = await fetch(
        `http://127.0.0.1:8000/api/art_event/sort/?attribute=${sortBy}`,
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        }
      );

      if (response.ok) {
        const sortedData = await response.json();

        setArtEventList(sortedData);
      } else {
        console.error("Error fetching sorted data:", response.statusText);
      }
    } catch (error) {
      console.error("An error occurred while sorting:", error);
    }
  };

  const handleSearch = async () => {
    try {
      const response = await fetch(
        `http://127.0.0.1:8000/api/art_event/search/?attribute=${searchInput}`,
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        }
      );

      if (response.ok) {
        const searchRes = await response.json();

        setArtEventList(searchRes);
      } else {
        console.error("Error fetching sorted data:", response.body);
      }
    } catch (error) {
      console.error("An error occurred while sorting:", error);
    }
  };

  const handleCheckboxChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    const { value } = event.target;
    if (sortBy === value) {
      setSortBy(null);
    } else {
      setSortBy(value);
    }
  };

  const handleDeleteArtEvent = async (artEventID: number) => {
    const userConfirmed = window.confirm(
      "Are you sure you want to delete event number " + artEventID + "?"
    );
    if (userConfirmed) {
      try {
        const response = await fetch(
          `http://127.0.0.1:8000/api/art_event/delete/?attribute=${artEventID}`,
          {
            method: "DELETE",
            headers: {
              "Content-Type": "application/json",
            },
          }
        );
        if (!response.ok) {
          console.log("res.body" + response.body);
          throw new Error("Error deleting item: " + artEventID);
        }
        setRenderTrigger((prev) => !prev);
      } catch (error) {
        console.error("An error occurred while deleting:", error);
        alert(
          "Failed to delete the event " + artEventID + ". Please try again."
        );
      }
    }
  };

  useEffect(() => {
    const fetchArtEvents = async () => {
      try {
        const response = await fetch("http://127.0.0.1:8000/api/art_event/get");
        if (!response.ok) {
          throw new Error("Failed to fetch art events");
        }
        const data = await response.json();
        setArtEventList(data);
      } catch (error) {
        console.error("Error fetching art events:", error);
      }
    };

    fetchArtEvents();
  }, [renderTrigger]);

  return (
    <div>
      <div className="container mx-auto px-4 py-8">
        <h1 className="text-3xl font-bold text-gray-800 my-4">Hello, user</h1>
        <div className="flex justify-between items-center mb-6">
          <h1 className="text-2xl font-bold text-gray-800">Art Events List</h1>
          <div>
            <Link to={"/login"}>
              <button className="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 mr-2">
                Login
              </button>
            </Link>
            <Link to={"/register"}>
              <button className="bg-green-500 text-white px-4 py-2 rounded-md shadow hover:bg-green-600">
                Register
              </button>
            </Link>
          </div>
        </div>

        <div className="flex justify-between mb-4">
          <div className="flex items-center mb-6">
            <input
              type="text"
              onChange={(e) => {
                setSearchInput(e.target.value);
              }}
              placeholder="Search by name"
              className="px-4 py-2 border border-gray-300 rounded-md mr-2"
            />
            <button
              className="bg-teal-500 text-white px-4 py-2 rounded-md shadow hover:bg-teal-600"
              onClick={() => handleSearch}
            >
              Search
            </button>
          </div>
          <div className="flex items-center mb-4">
            <span className="mr-2 text-lg">Sort by:</span>
            <div className="mr-4">
              <input
                type="checkbox"
                id="sortById"
                name="sortBy"
                value="id"
                checked={sortBy === "id"}
                onChange={handleCheckboxChange}
                className="mr-2"
              />
              <label htmlFor="sortById">ID</label>
            </div>
            <div className="mr-4">
              <input
                type="checkbox"
                id="sortByName"
                name="sortBy"
                value="name"
                checked={sortBy === "name"}
                onChange={handleCheckboxChange}
                className="mr-2"
              />
              <label htmlFor="sortByName">Name</label>
            </div>
            <div className="mr-4">
              <input
                type="checkbox"
                id="sortByDate"
                name="sortBy"
                value="date"
                checked={sortBy === "date"}
                onChange={handleCheckboxChange}
                className="mr-2"
              />
              <label htmlFor="sortByDate">Date</label>
            </div>
            <button
              className="bg-teal-500 text-white px-4 py-2 rounded-md shadow hover:bg-teal-600"
              onClick={() => handleSort}
            >
              Sort
            </button>
          </div>
        </div>

        <div className="">
          <table className="min-w-full bg-white rounded-lg">
            <thead>
              <tr className="bg-gray-200 text-gray-600 text-sm uppercase leading-normal">
                <th className="py-3 px-6 text-left">ID</th>
                <th className="py-3 px-6 text-left">Name</th>
                <th className="py-3 px-6 text-left">Date</th>
                <th className="py-3 px-6 text-left">Description</th>
                <th className="py-3 px-6 text-left">action</th>
              </tr>
            </thead>
            <tbody className="text-gray-700 text-sm font-light">
              {artEventList.map((artEvent) => (
                <tr
                  className="border-b border-gray-200 hover:bg-gray-100"
                  key={artEvent.id}
                >
                  <td className="py-3 px-6 text-left">{artEvent.id}</td>
                  <td className="py-3 px-6 text-left">{artEvent.name}</td>
                  <td className="py-3 px-6 text-left">{artEvent.date}</td>
                  <td className="py-3 px-6 text-left">
                    {artEvent.description}
                  </td>
                  <td className="py-3 px-6 text-left text-red-500 ">
                    <button
                      className="hover:underline"
                      onClick={() => handleDeleteArtEvent(artEvent.id)}
                    >
                      delete
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
};

export default Overview;
