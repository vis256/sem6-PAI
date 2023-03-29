import { Todo } from "@/todoReducer";
import Task from "./task";

export default function List(props: { Todos: Todo[]; Dispatch: any }) {
  return (
    <>
      <ul>
        {props.Todos.map((todo) => (
          <Task Dispatch={props.Dispatch} key={todo.key} Todo={todo}></Task>
        ))}
      </ul>
    </>
  );
}
