import { STORAGE_KEY, generateUUID } from "./utils";

export type Todo = {
  key: string;
  content: string;
  finished: boolean;
};

export const initialTodoReducerState: Todo[] = [];

export function todoReducer(state: Todo[], action: any) {
  let newState: Todo[];
  switch (action.type) {
    case "ADD":
      newState = [
        ...state,
        { key: generateUUID(), content: action.content, finished: false },
      ];

      saveTodosToStorage(newState);

      return newState;

    case "REMOVE":
      newState = state.filter((todo) => todo.key !== action.key);

      saveTodosToStorage(newState);

      return newState;
    case "TOGGLE":
      newState = state.map((todo) =>
        todo.key === action.key ? { ...todo, finished: !todo.finished } : todo
      );

      saveTodosToStorage(newState);

      return newState;

    case "SET":
      newState = action.todos;

      saveTodosToStorage(newState);

      return newState;

    default:
      return state;
  }
}

const saveTodosToStorage = (todos: Todo[]) => {
  const storageContent = JSON.stringify(todos);

  window.localStorage.setItem(STORAGE_KEY, storageContent);
};
