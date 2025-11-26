import { describe, it, expect } from "vitest";
import { calculate } from "../calculate.js";

describe("", () => {
    it("計算結果が正しいか", () => {
        const result = calculate({
            landArea: 100,
            far: 200,
            bcr: 60,
            pricePerTsubo: 87,
        });

        expect(result.maxFloorArea).toBe(60);
        expect(result.buildableArea).toBe(120);
        expect(result.buildableAreaTsubo).toBe(36);
        expect(result.buildingCost).toBe(3163);
    });

    it("入力が０または負の場合の扱い", () => {
        const result = calculate({
            landArea: -100,
            far: 100,
            bcr: 50,
            pricePerTsubo: 100,
        });
        expect(result.error).toBe(true);
    });

    it("小数点処理が正しいか", () => {
        const result = calculate({
            landArea: 100.0,
            far: 100.0,
            bcr: 50.0,
            pricePerTsubo: 100.0,
        });
        expect(result.maxFloorArea).toBe(Math.floor( 100.0 * (50.0 / 100)));
        expect(result.buildableArea).toBe(Math.floor(50.0 * (100.0 / 100)));
        expect(result.buildableAreaTsubo).toBe(Math.floor( 50.0 / 3.3));
        expect(result.buildingCost).toBe(Math.floor((50.0 / 3.3) * 100.0));


    });
    it("予想外の値(異常系)", () => {
        const result = calculate({
            landArea: "ab",
            far: NaN,
            bcr: 50,
            pricePerTsubo: 100,
        });
        expect(result.error).toBe(true);
    });
});
