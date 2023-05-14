import { useState, React } from "react";
import axios from "axios";
import "./style.css";

const CreatePost = () => {
  const [inputs, setInput] = useState();
  const submitHandler = (e) => {
    axios
      .post("http://localhost:8000/api/createPost.php", inputs)
      .then((response) => alert(response.data.message));
  };
  const handleChange = (e) => {
    const name = e.target.name;
    const value = e.target.value;
    setInput((values) => ({ ...values, [name]: value }));
  };
  return (
    <div className="createUpdate">
      <h2>Cteate new post</h2>
      <form onSubmit={submitHandler} action="/">
        <div>
          <label htmlFor="title">Title</label>
          <input
            type="text"
            name="title"
            onChange={handleChange}
            id="title"
            required
          />
        </div>
        <div>
          <label htmlFor="body">Body</label>
          <textarea
            className="bodyInput"
            name="body"
            onChange={handleChange}
            id="body"
            rows={30}
            required
          ></textarea>
        </div>
        <div>
          <label htmlFor="author">Author</label>
          <input
            type="text"
            name="author"
            onChange={handleChange}
            id="author"
            required
          />
        </div>
        <div>
          <label htmlFor="category">Catetory</label>
          <input
            type="text"
            name="category"
            onChange={handleChange}
            id="category"
            required
          />
        </div>
        <div>
          <label htmlFor="img">Img Url</label>
          <input
            type="text"
            name="img"
            onChange={handleChange}
            id="img"
            required
          />
        </div>
        <input className="submitBtn" type="submit" value="Create" />
      </form>
    </div>
  );
};

export default CreatePost;
